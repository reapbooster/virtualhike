var vrView; 
var img_dir = './img/';
var img_360_suffix = '.jpg';
var img_preview_suffix = '-preview.jpg';

function onLoad() {
    vrView = new VRView.Player('#vrview', {
    width: '100%',
    height: '90%',
    image: './img/blank.jpg',
    is_stereo: false,
    is_autospan_off: true
  });

  vrView.on('ready', onVRViewReady);
  vrView.on('modechange', onModeChange);
  vrView.on('getposition', onGetPosition);
  vrView.on('error', onVRViewError);

}

function get360URL(img_path){
    return img_dir + img_path + img_360_suffix;
}

function get360PreviewURL(img_path){
    return img_dir + img_path + img_preview_suffix;
}

function loadScene(img_path) {
  console.log('loadScene', img_path);

  // Set the image
  vrView.setContent({
    image: get360URL(img_path),
    preview: get360PreviewURL(img_path),
    is_stereo: false,
    is_autopan_off: true
  });

  // Unhighlight carousel items
  var carouselLinks = document.querySelectorAll('ul.carousel li a');
  for (var i = 0; i < carouselLinks.length; i++) {
    carouselLinks[i].classList.remove('current');
  }
    vrView.getPosition();
  // Highlight current carousel item
  document.querySelector('ul.carousel li a[href="#' + img_path + '"]')
      .classList.add('current');
}

function onVRViewReady(e) {
  console.log('onVRViewReady');

  // Create the carousel links
  var carouselItems = document.querySelectorAll('ul.carousel li a');
  for (var i = 0; i < carouselItems.length; i++) {
    var item = carouselItems[i];
    item.disabled = false;

    item.addEventListener('click', function(event) {
      event.preventDefault();
      loadScene(event.target.parentNode.getAttribute('href').substring(1));
    });
  }

  loadScene(document.getElementById('first_360_image').getAttribute('href').substring(1));
}


function onModeChange(e) {
  console.log('onModeChange', e.mode);
}

function onVRViewError(e) {
  console.log('Error! %s', e.message);
}

function onGetPosition(e) {
    console.log(e)
}

window.addEventListener('load', onLoad);
