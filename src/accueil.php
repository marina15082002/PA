<?php include __DIR__ . "\header.php";?>

<?php
/*
    if (!empty($_SESSION['id'])) {
        echo "<a href='signout'>Déconnexion</a>";
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

    <script type="module">
        import * as THREE from '/PA/library/three.js-master/build/three.module.js';

        import { GUI } from "../library/three.js-master/examples/jsm/libs/dat.gui.module.js"; //lib for menu controls
        import { OrbitControls } from "../library/three.js-master/examples/jsm/controls/OrbitControls.js";
        import { CSMHelper } from '../library/three.js-master/examples/jsm/csm/CSMHelper.js'; // Helper for lights and shadows
        import { MTLLoader } from "/PA/library/three.js-master/examples/jsm/loaders/MTLLoader.js"; // Material/texture for objects (blender)
        import { OBJLoader } from "/PA/library/three.js-master/examples/jsm/loaders/OBJLoader.js"; // Material (blender)
        import { FBXLoader } from "../library/three.js-master/examples/jsm/loaders/FBXLoader.js";
        import Stats from "../library/three.js-master/examples/jsm/libs/stats.module.js";
        //import {loadSkybox} from "../library/loadSkybox.js";

        let renderer, scene, camera, controls, stats;
        let ambient, spotLight, lightHelper, shadowCameraHelper;
        let basket;
        let listener, sound, audioLoader;
        let gui, csm, csmHelper;
        let ambientFolder, spotLightFolder, positionFolder, csmFolder, cameraFolder, sceneFolder;
        let chest, chestBody, chestTop, rotationPoint, mask, maskLight;

        let status = "closed";

        await init(); //asynchronous start
        //buildGui();
        render();
        animate();

        async function init() {

            /*** Renderer ***/
            renderer = new THREE.WebGLRenderer();
            renderer.setPixelRatio( window.devicePixelRatio );
            renderer.setSize( window.innerWidth, window.innerHeight );
            document.getElementById("main").appendChild( renderer.domElement );

            renderer.shadowMap.enabled = true;  // show shadows

            renderer.outputEncoding = THREE.sRGBEncoding; // in output encoding, we define color rgb

            /*** Create scene and camera ***/

            scene = new THREE.Scene();

            scene.background = new THREE.Color( 0xE9F0FF );


            camera = new THREE.PerspectiveCamera( 35, window.innerWidth / window.innerHeight, 1, 5000 );
            camera.position.set(770, 285, 40); //x, y, z


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
                    basket.rotation.y = -1.5708; // 90° in radians
                    basket.position.set(700, 254, 15);
                    scene.add( basket );
                });
            });


            scene.add(basket);


            /*** Orbit controls ***/

            controls = new OrbitControls( camera, renderer.domElement );
            /*
            controls.addEventListener( 'change', render );
            controls.minDistance = 50;
            controls.maxDistance = 1000;
*/
            /*** Ambient Light ***/
            // soft white light presence on all the scene

            // AmbientLight (color, intensity)
            ambient = new THREE.AmbientLight( 0xffffff, 1 );
            scene.add( ambient );

            /*** Settings spotLight ***/

            // SpotLight (color, intensity)
            spotLight = new THREE.SpotLight( 0xffffff, 1 );
            spotLight.position.set( 15, 300, 35 );
            // Maximum size of the spotlight angle whose upper bound is Math.PI/4
            // The angle is radian
            spotLight.angle = Math.PI / 4;
            // percent of the spotlight cone attenuated due to penumbra
            spotLight.penumbra = 0.1;
            // the amount the light dims along the distance of the light
            spotLight.decay = 2;
            // distance of the projection of the spotLight
            spotLight.distance = 200;
            /*** Setting shadows spotLight ***/

            // dynamic shadows projected
            spotLight.castShadow = true;

            spotLight.shadow.mapSize.width = 512; // 512 value default
            spotLight.shadow.mapSize.height = 512; // 512 value default
            spotLight.shadow.camera.near = 0.5; // 0.5 value default
            spotLight.shadow.camera.far = 500; // 500 value default
            spotLight.shadow.focus = Math.PI / 4; // focus is equal angle of the spotlight
            scene.add( spotLight );

            /*** LightHelper ***/

            // Helper lines for the light direction
            lightHelper = new THREE.SpotLightHelper( spotLight );
            // By default is not visible
            lightHelper.visible = false;
            scene.add( lightHelper );

            /*** CameraHelper ***/

            // Helper for the camera for spotlight shadow
            shadowCameraHelper = new THREE.CameraHelper( spotLight.shadow.camera );
            // By default is not visible
            shadowCameraHelper.visible = false;
            scene.add( shadowCameraHelper );

            /*** Sound ***/

            listener = new THREE.AudioListener();

            // Add listener at the camera
            camera.add( listener );
            /*
                        sound = new THREE.Audio( listener );

                        audioLoader = new THREE.AudioLoader();

                        audioLoader.load( './assets/songs/atlantis.mp3', function( buffer ) {
                            sound.setBuffer( buffer );
                            sound.setLoop( true );
                            sound.setVolume( 0.5 );
                            sound.play();
                        });
            */
            /******************/

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

            /*** Scene ***/

            //Folder scene
            sceneFolder = gui.addFolder('Scene');

            const paramsScene = {
                rotationx: scene.rotation.x,
                rotationy: scene.rotation.y
            };

            // Change position x of the scene
            sceneFolder.add(paramsScene, 'rotationx', -6.30, 6.30, 0.01 ).name('Rotation x').onChange( function ( val ) {
                scene.rotation.x = val;
                render();
            } );

            // Change position y of the scene
            sceneFolder.add(paramsScene, 'rotationy', -6, 6, 0.01 ).name('Rotation y').onChange( function ( val ) {
                scene.rotation.y = val;
                render();
            } );

            /*** Camera ***/

            //Folder camera
            cameraFolder = gui.addFolder('Camera');

            const paramsCamera = {
                position: camera.position.set(700, 300, 10)
            };

            // Change position x of the camera
            cameraFolder.add(paramsCamera.position, 'x', 45, 1000, 1 ).name('Position x').onChange( function ( val ) {
                camera.position.set.z = val;
                render();
            } );

            // Change position y of the camera
            cameraFolder.add(paramsCamera.position, 'y', 50, 500, 1 ).name('Position y').onChange( function ( val ) {
                camera.position.set.z = val;
                render();
            } );

            // Change position z of the camera
            cameraFolder.add(paramsCamera.position, 'z', -100, 150, 1 ).name('Position z').onChange( function ( val ) {
                camera.position.set.z = val;
                render();
            } );

            /*** Light Ambient ***/

            const paramsAmbientLight = {
                'ambient color': ambient.color.getHex(),
                ambient: ambient.intensity
            };

            // Folder light ambient
            ambientFolder = gui.addFolder('Light ambient');

            // Change color oh the ambient light
            ambientFolder.addColor( paramsAmbientLight, 'ambient color' ).onChange( function ( val ) {
                ambient.color.setHex( val );
                render();
            } );

            // Change intensity of the ambient light
            ambientFolder.add( paramsAmbientLight, 'ambient', 0, 1, 0.01 ).name('Ambient intensity').onChange( function ( val ) {
                ambient.intensity = val;
                render();
            } );

            /*** SpotLight ***/

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

            // Folder spotlight
            spotLightFolder = gui.addFolder('SpotLight');

            // Change color of the spotlight
            spotLightFolder.addColor( paramsSpotLight, 'light color' ).name('Light color').onChange( function ( val ) {
                spotLight.color.setHex( val );
                render();
            } );

            // // Change intensity y of the spotlight
            spotLightFolder.add( paramsSpotLight, 'intensity', 0, 2 ).name('Intensity').onChange( function ( val ) {
                spotLight.intensity = val;
                render();
            } );

            // Change distance center of the spotlight
            spotLightFolder.add( paramsSpotLight, 'distance', 50, 200 ).name('Distance').onChange( function ( val ) {
                spotLight.distance = val;
                render();
            } );

            // Change angle of the spotlight
            spotLightFolder.add( paramsSpotLight, 'angle', 0, Math.PI / 3 ).name('Angle').onChange( function ( val ) {
                spotLight.angle = val;
                render();
            } );

            // Change penumbra of the spotlight
            spotLightFolder.add( paramsSpotLight, 'penumbra', 0, 1 ).name('Penumbra').onChange( function ( val ) {
                spotLight.penumbra = val;
                render();
            } );

            spotLightFolder.add( paramsSpotLight, 'decay', 1, 10, 0.01 ).name('Decay').onChange( function ( val ) {
                spotLight.decay = val;
                render();
            } );

            /*** Position of the spotLight ***/

            // Folder position spotLight
            positionFolder = gui.addFolder('Position SpotLight')

            // Change position x of the spotlight
            // min -100, max 100, interval 0.01
            positionFolder.add( paramsSpotLight.position, 'x', -100, 100, 0.01 ).name('Position x').onChange( function ( val ) {
                spotLight.position.set.x = val;
                render();
            } );

            // Change position y of the spotlight
            positionFolder.add( paramsSpotLight.position, 'y', 0, 100, 0.01 ).name('Position y').onChange( function ( val ) {
                spotLight.position.set.y = val;
                render();
            } );

            // Change position z of the spotlight
            positionFolder.add( paramsSpotLight.position, 'z', -100, 100, 0.01 ).name('Position z').onChange( function ( val ) {
                spotLight.position.set.z = val;
                render();
            } );

            /*** CSM Helper ***/

            csmFolder = gui.addFolder('CSM Helper');

            // Allows you to use the CSMHelper
            csmHelper = new CSMHelper( csm );
            // By default they are unchecked
            csmHelper.visible = false;
            scene.add( csmHelper );

            // Display or deactivate lights helpers
            csmFolder.add( csmHelper, 'visible' ).name('LightHelper').onChange( function ( val ) {
                lightHelper.visible = val;
                render();
            } );

            // Display or deactivate camera helpers
            csmFolder.add( csmHelper, 'visible' ).name('CameraHelper').onChange( function ( val ) {
                shadowCameraHelper.visible = val;
                render();
            } );

            gui.open();

        }

        function animate() {

            requestAnimationFrame( animate );

            //basket.rotation.x += 0.005;
            basket.rotation.y += 0.005;

            renderer.render( scene, camera );

        }

        function logKey(event) {
            // when keydown 'o', open all folders
            if (event.keyCode === 79)
            {
                sceneFolder.open();
                cameraFolder.open();
                ambientFolder.open();
                positionFolder.open();
                spotLightFolder.open();
                csmFolder.open();
            }

            // when keydowm 'c', close all folders
            if (event.keyCode === 67)
            {
                cameraFolder.close();
                sceneFolder.close();
                ambientFolder.close();
                positionFolder.close();
                spotLightFolder.close();
                csmFolder.close();
            }

            if (event.keyCode === 32) { // spacebar
                if (status === "closed") {
                    maskLight.intensity = 1;
                    status = "opening"
                } else if (status === "opened") {
                    maskLight.intensity = 0;
                    status = "closing"
                }
            }
        }
    </script>



        </main>
