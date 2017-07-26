<div id="popup-welcome" class="popup mfp-hide">
	<div class="popupfullcontent">
    	<h3 class="title">Upload <span class="red">Cumi</span></h3>
        <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec ullamcorper nulla non metus auctor fringilla. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
    </div>
</div><!-- END .popup -->
<script>
$(document).ready(function () {
setTimeout(function() {
 if ($('#popup-welcome').length) {
   $.magnificPopup.open({
    items: {
        src: '#popup-welcome' 
    },
    type: 'inline'
      });
   }
 }, 0);
});
</script>