import * as THREE from 'three';

        // --- Configuración básica ---
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            canvas: document.getElementById('webgl-canvas'),
            antialias: true,
            alpha: true,
        });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        camera.position.z = 5;

        // --- Luces (con más contraste) ---
        const ambientLight = new THREE.AmbientLight(0xffffff, 1); // Menos luz ambiental
        scene.add(ambientLight);
        const directionalLight = new THREE.DirectionalLight(0x0f4a86, 5); // Más luz direccional
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // --- Texturas ---
        const textureLoader = new THREE.TextureLoader();
        const doorTexture = textureLoader.load('/assets/img/door_pattern.jpg');
        const frameTexture = textureLoader.load('/assets/img/door_pattern_square.jpg');
        const topFrameTexture = textureLoader.load('/assets/img/door_pattern_top.jpg');
        
        // --- Materiales ---
        const doorMaterial = new THREE.MeshStandardMaterial({ map: doorTexture, metalness: 0.6, roughness: 0.8 });
        const frameMaterial = new THREE.MeshStandardMaterial({ map: frameTexture, metalness: 0.2, roughness: 0.8 });
        const topFrameMaterial = new THREE.MeshStandardMaterial({ map: topFrameTexture, metalness: 0.2, roughness: 0.8 });
        const handleMaterial = new THREE.MeshStandardMaterial({ color: 0xffd700, metalness: 0.9, roughness: 0.3 });

        // --- Creación del Marco y las Puertas ---
        const doorWidth = 2;
        const doorHeight = 5;
        const doorDepth = 0.15;
        const frameThickness = 0.2;
        const doorAssembly = new THREE.Group();
        scene.add(doorAssembly);
        const frameHeight = doorHeight + frameThickness;

        // Marco
        const topFrame = new THREE.Mesh(new THREE.BoxGeometry(doorWidth * 2 + frameThickness * 2, frameThickness, doorDepth), topFrameMaterial); // Material específico
        topFrame.position.y = frameHeight - (frameThickness / 2);
        doorAssembly.add(topFrame);
        const leftFrame = new THREE.Mesh(new THREE.BoxGeometry(frameThickness, frameHeight, doorDepth), frameMaterial);
        leftFrame.position.x = -doorWidth - (frameThickness / 2);
        leftFrame.position.y = frameHeight / 2;
        doorAssembly.add(leftFrame);
        const rightFrame = new THREE.Mesh(new THREE.BoxGeometry(frameThickness, frameHeight, doorDepth), frameMaterial);
        rightFrame.position.x = doorWidth + (frameThickness / 2);
        rightFrame.position.y = frameHeight / 2;
        doorAssembly.add(rightFrame);

        // Pivotes para las puertas
        const leftDoorPivot = new THREE.Group();
        const rightDoorPivot = new THREE.Group();
        doorAssembly.add(leftDoorPivot, rightDoorPivot);
        leftDoorPivot.position.x = -doorWidth;
        rightDoorPivot.position.x = doorWidth;
        const doorGeometry = new THREE.BoxGeometry(doorWidth, doorHeight, doorDepth);
        const leftDoor = new THREE.Mesh(doorGeometry, doorMaterial);
        leftDoor.position.x = doorWidth / 2;
        leftDoor.position.y = doorHeight / 2;
        leftDoorPivot.add(leftDoor);
        const rightDoor = new THREE.Mesh(doorGeometry, doorMaterial);
        rightDoor.position.x = -doorWidth / 2;
        rightDoor.position.y = doorHeight / 2;
        rightDoorPivot.add(rightDoor);

        // Manijas
        function createDoorHandle() {
            const handleGroup = new THREE.Group();
            const plate = new THREE.Mesh(new THREE.BoxGeometry(0.12, 0.32, 0.02), handleMaterial);
            const grip = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.03, 0.20, 32), handleMaterial);
            grip.rotation.z = Math.PI / 2;
            grip.position.z = 0.04;
            handleGroup.add(plate, grip);
            return handleGroup;
        }
        const leftHandle = createDoorHandle();
        leftHandle.position.set(0.75, 0, doorDepth / 2 + 0.01);
        leftDoor.add(leftHandle);
        const rightHandle = createDoorHandle();
        rightHandle.position.set(-0.75, 0, doorDepth / 2 + 0.01);
        rightDoor.add(rightHandle);

        doorAssembly.position.y = -frameHeight / 2;
        doorAssembly.scale.set(1.1, 1.1, 1.1);

        // --- Lógica de Scroll ---
        const contentSection = document.getElementById('content-section');
        const scrollIndicator = document.getElementById('scroll-down-indicator');
        let doorsOpen = false;

        function updateAnimation() {
            const scrollY = window.scrollY;
            const scrollableHeight = window.innerHeight; // La animación dura 1 viewport de scroll
            let progress = scrollY / scrollableHeight;
            progress = Math.min(Math.max(progress, 0), 1);

            const maxRotation = Math.PI / 2 * 1.1; // Las puertas abren un poco más de 90 grados
            leftDoorPivot.rotation.y = -progress * maxRotation;
            rightDoorPivot.rotation.y = progress * maxRotation;

            camera.position.z = 5 + progress * 3;

            // Lógica para mostrar el contenido
            if (progress > 0.9 && !doorsOpen) {
                contentSection.classList.add('visible');
                doorsOpen = true;
            } else if (progress <= 0.9 && doorsOpen) {
                contentSection.classList.remove('visible');
                doorsOpen = false;
            }
            
            // Lógica para el indicador de scroll
            if (progress > 0.01) {
                scrollIndicator.classList.remove('visible');
            } else {
                scrollIndicator.classList.add('visible');
            }
        }
        window.addEventListener('scroll', updateAnimation);

        // --- Render Loop ---
        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();

        // --- Manejo de redimensionamiento ---
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        });

        // Llamada inicial para establecer el estado
        updateAnimation();
        
        // Detener video de YouTube cuando se cierra el modal
        document.querySelectorAll('.modal').forEach(modal => {
            const iframe = modal.querySelector('iframe');
            if (iframe) {
                const originalSrc = iframe.src;
                modal.addEventListener('hidden.bs.modal', () => {
                    iframe.src = '';
                });
                modal.addEventListener('show.bs.modal', () => {
                    iframe.src = originalSrc;
                });
            }
        });
