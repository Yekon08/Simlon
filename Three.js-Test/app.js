const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );

const controls = new THREE.OrbitControls( camera );
controls.enableZoom = false;
camera.position.set( 1, 0, 0 );
controls.update();

const geometry = new THREE.SphereBufferGeometry( 50, 32, 32 );
const textureLoader = new THREE.TextureLoader()
const texture = textureLoader.load('737385.jpg')
const material = new THREE.MeshBasicMaterial( {
    map: texture,
    side: THREE.DoubleSide

} );
const sphere = new THREE.Mesh( geometry, material );
scene.add( sphere );

function animate() 
{
	requestAnimationFrame( animate );
	renderer.render( scene, camera );
}
animate();

function onResize ()
{
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
}

window.addEventListener('resize', onResize);