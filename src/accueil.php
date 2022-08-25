<?php include __DIR__ . "\header.php";?>

<?php
/*
    if (!empty($_SESSION['id'])) {
        echo "<a href='signout'>Déconnexion</a>";
        echo $_SESSION['email'];
    }
*/
?>

<style>
    main{
        z-index: 2;
    }

    canvas{
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        margin-top: 100px;
    }

    body {
        overflow-x: hidden;
        overflow-y: scroll;
        padding: 0;
        margin: 0;
    }

    #viewport {
        position: fixed;
        margin: 0;
        padding: 0;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
    }
    .page-wrapper {
        padding: 0px;
        margin: 12px 48px;
        position: absolute;
        left: 0;
        top: 0;
        width: calc(100% - 2*48px);
        word-wrap: break-word;
    }

</style>

<main id="main">
    <!--<h1 style="
    color:black!important;
    font-weight: 400;
    ">On dit non au gaspillage avec No more Waste</h1>-->

    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-8" style="padding-top: 200px;">
            <h1 class="c-model-scroll__header-title u-a6 js-header-title" style="font-family: 'Roboto';font-weight:500; font-size:100px!important; opacity: 1; visibility: inherit; transform: translate(-0.096vw, -0.0839vw);">
                <div style="display: block; text-align: start; position: relative; opacity: 1; visibility: inherit; transform: translate(0px, 0%);"><i style="color: #2a2a2a; font-style: normal"> On dit non </i></div>
                <div style="display: block; text-align: start; position: relative; opacity: 1; visibility: inherit; transform: translate(0px, 0%);"><i style="color: #2a2a2a; font-style: normal"> Au gaspillage avec </i></div>
                <div style="display: block; text-align: start; position: relative; opacity: 1; visibility: inherit; transform: translate(0px, 0%);"><i style="color: #0d74d3;font-style: normal;">No More Waste</i></div>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7"></div>
        <label class="col-sm-4" style="margin-top:5%">Clique sur C pour vider le panier ou sur O pour le remplir !</label>
    </div>

    <script type="module">
        import * as THREE from '/PA/library/three.js-master/build/three.module.js';

        import { GUI } from "../library/three.js-master/examples/jsm/libs/dat.gui.module.js"; //lib for menu controls
        import { OrbitControls } from "../library/three.js-master/examples/jsm/controls/OrbitControls.js";
        import { CSMHelper } from '../library/three.js-master/examples/jsm/csm/CSMHelper.js'; // Helper for lights and shadows
        import { MTLLoader } from "/PA/library/three.js-master/examples/jsm/loaders/MTLLoader.js"; // Material/texture for objects (blender)
        import { OBJLoader } from "/PA/library/three.js-master/examples/jsm/loaders/OBJLoader.js"; // Material (blender)
        import { FBXLoader } from "../library/three.js-master/examples/jsm/loaders/FBXLoader.js";
        import Stats from "../library/three.js-master/examples/jsm/libs/stats.module.js";

        let renderer, scene, camera, controls, stats;
        let ambient, spotLight, lightHelper, shadowCameraHelper;
        let basket, basketWithout;
        let listener, sound, audioLoader;
        let gui, csm, csmHelper;
        let ambientFolder, spotLightFolder, positionFolder, csmFolder, cameraFolder, sceneFolder;
        let chest, chestBody, chestTop, rotationPoint, mask, maskLight;

        let status = "closed";

        await init();
        render();
        animate();

        async function init() {
            renderer = new THREE.WebGLRenderer();
            renderer.setPixelRatio( window.devicePixelRatio );
            renderer.setSize( window.innerWidth, window.innerHeight );
            document.getElementById("main").appendChild( renderer.domElement );

            renderer.shadowMap.enabled = true;

            renderer.outputEncoding = THREE.sRGBEncoding;

            scene = new THREE.Scene();

            scene.background = new THREE.Color( 0xE9F0FF );


            camera = new THREE.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 1, 5000 );
            camera.position.set(770, 285, 40);


            var mtlLoader = new MTLLoader();

            basket = undefined;
            mtlLoader.load("/PA/src/assets/basket.mtl", function(materials)
            {
                materials.preload();
                var objLoader = new OBJLoader();
                objLoader.setMaterials(materials);
                objLoader.load("/PA/src/assets/basket.obj", function(object)
                {
                    basket = object;
                    basket.scale.set(9, 9, 9);
                    basket.rotation.y = -1.5708;
                    basket.position.set(700, 254, 15);
                    scene.add( basket );
                });
            });

            basketWithout = undefined;
            mtlLoader.load("/PA/src/assets/basketWithout.mtl", function(materials)
            {
                materials.preload();
                var objLoader = new OBJLoader();
                objLoader.setMaterials(materials);
                objLoader.load("/PA/src/assets/basketWithout.obj", function(object)
                {
                    basketWithout = object;
                    basketWithout.scale.set(9, 9, 9);
                    basketWithout.rotation.y = -1.5708;
                    basketWithout.position.set(700, 254, 15);
                });
            });

            controls = new OrbitControls( camera, renderer.domElement );

            ambient = new THREE.AmbientLight( 0xffffff, 0.2 );
            scene.add( ambient );

            spotLight = new THREE.SpotLight( 0xffffff, 1 );
            spotLight.position.set( 700, 280, 25 );

            spotLight.angle = Math.PI / 2;
            spotLight.penumbra = 0.1;
            spotLight.decay = 2;
            spotLight.distance = 400;

            spotLight.castShadow = true;

            spotLight.shadow.mapSize.width = 512;
            spotLight.shadow.mapSize.height = 512;
            spotLight.shadow.camera.near = 0.5;
            spotLight.shadow.camera.far = 500;
            spotLight.shadow.focus = Math.PI / 4;
            scene.add( spotLight );

            lightHelper = new THREE.SpotLightHelper( spotLight );
            lightHelper.visible = false;
            scene.add( lightHelper );

            shadowCameraHelper = new THREE.CameraHelper( spotLight.shadow.camera );
            shadowCameraHelper.visible = false;
            scene.add( shadowCameraHelper );

            listener = new THREE.AudioListener();

            camera.add( listener );

            render();

            window.addEventListener( 'resize', onWindowResize );
        }

        function updateCamera(ev) {
            let div1 = document.getElementById("main");
            basket.position.z = -1.5 + window.scrollY / 250.0;
        }

        window.addEventListener("scroll", updateCamera);

        function onWindowResize() {

            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();

            renderer.setSize( window.innerWidth, window.innerHeight );

        }

        function render() {

            lightHelper.update();

            shadowCameraHelper.update();

            renderer.render( scene, camera );

        }

        function buildGui() {

            gui = new GUI();
            sceneFolder = gui.addFolder('Scene');

            const paramsScene = {
                rotationx: scene.rotation.x,
                rotationy: scene.rotation.y
            };

            sceneFolder.add(paramsScene, 'rotationx', -6.30, 6.30, 0.01 ).name('Rotation x').onChange( function ( val ) {
                scene.rotation.x = val;
                render();
            } );

            sceneFolder.add(paramsScene, 'rotationy', -6, 6, 0.01 ).name('Rotation y').onChange( function ( val ) {
                scene.rotation.y = val;
                render();
            } );
            cameraFolder = gui.addFolder('Camera');

            const paramsCamera = {
                position: camera.position.set(700, 300, 10)
            };

            cameraFolder.add(paramsCamera.position, 'x', 45, 1000, 1 ).name('Position x').onChange( function ( val ) {
                camera.position.set.z = val;
                render();
            } );

            cameraFolder.add(paramsCamera.position, 'y', 50, 500, 1 ).name('Position y').onChange( function ( val ) {
                camera.position.set.z = val;
                render();
            } );

            cameraFolder.add(paramsCamera.position, 'z', -100, 150, 1 ).name('Position z').onChange( function ( val ) {
                camera.position.set.z = val;
                render();
            } );

            const paramsAmbientLight = {
                'ambient color': ambient.color.getHex(),
                ambient: ambient.intensity
            };

            ambientFolder = gui.addFolder('Light ambient');

            ambientFolder.addColor( paramsAmbientLight, 'ambient color' ).onChange( function ( val ) {
                ambient.color.setHex( val );
                render();
            } );

            ambientFolder.add( paramsAmbientLight, 'ambient', 0, 1, 0.01 ).name('Ambient intensity').onChange( function ( val ) {
                ambient.intensity = val;
                render();
            } );

            const paramsSpotLight = {
                'light color': spotLight.color.getHex(),
                intensity: spotLight.intensity,
                distance: spotLight.distance,
                angle: spotLight.angle,
                penumbra: spotLight.penumbra,
                decay: spotLight.decay,
                focus: spotLight.shadow.focus,
                position: spotLight.position.set(15, 150, 35)
            };

            spotLightFolder = gui.addFolder('SpotLight');

            spotLightFolder.addColor( paramsSpotLight, 'light color' ).name('Light color').onChange( function ( val ) {
                spotLight.color.setHex( val );
                render();
            } );

            spotLightFolder.add( paramsSpotLight, 'intensity', 0, 2 ).name('Intensity').onChange( function ( val ) {
                spotLight.intensity = val;
                render();
            } );

            spotLightFolder.add( paramsSpotLight, 'distance', 50, 200 ).name('Distance').onChange( function ( val ) {
                spotLight.distance = val;
                render();
            } );

            spotLightFolder.add( paramsSpotLight, 'angle', 0, Math.PI / 3 ).name('Angle').onChange( function ( val ) {
                spotLight.angle = val;
                render();
            } );

            spotLightFolder.add( paramsSpotLight, 'penumbra', 0, 1 ).name('Penumbra').onChange( function ( val ) {
                spotLight.penumbra = val;
                render();
            } );

            spotLightFolder.add( paramsSpotLight, 'decay', 1, 10, 0.01 ).name('Decay').onChange( function ( val ) {
                spotLight.decay = val;
                render();
            } );

            positionFolder = gui.addFolder('Position SpotLight')

            positionFolder.add( paramsSpotLight.position, 'x', -100, 100, 0.01 ).name('Position x').onChange( function ( val ) {
                spotLight.position.set.x = val;
                render();
            } );

            positionFolder.add( paramsSpotLight.position, 'y', 0, 100, 0.01 ).name('Position y').onChange( function ( val ) {
                spotLight.position.set.y = val;
                render();
            } );

            positionFolder.add( paramsSpotLight.position, 'z', -100, 100, 0.01 ).name('Position z').onChange( function ( val ) {
                spotLight.position.set.z = val;
                render();
            } );

            gui.open();

        }

        function animate() {

            requestAnimationFrame( animate );

            basket.rotation.y += 0.005;
            basketWithout.rotation.y += 0.005;

            window.addEventListener('keydown', logKey);

            renderer.render( scene, camera );

        }

        function logKey(event) {
            if (event.keyCode === 79)
            {
                scene.add( basket);
                scene.remove( basketWithout );
            }

            if (event.keyCode === 67)
            {
                scene.add( basketWithout );
                scene.remove( basket );
            }
        }
    </script>
</main>
