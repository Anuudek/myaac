<div class="Themebox" style="background-image:url(<?php echo $template_path ?>/images/themeboxes/premium/themebox.png); height: 204px;">
  
  <div id="PremiumBoxBg" style="background-image:url(<?php echo $template_path ?>/images/themeboxes/premium/coins_trade.png);"></div>
  
  <div id="PremiumBoxOverlay" style="background-image:url(<?php echo $template_path ?>/images/themeboxes/premium/type_overlay.png);">
    <p id="PremiumBoxOverlayText">Exclusive Content</p>
  </div>
  
  <div id="PremiumBoxButton">
    <form action="<?= getLink('points'); ?>" method="post" style="padding:0px;margin:0px;">
      <div class="BigButton" style="background-image:url(<?php echo $template_path ?>/images/global/buttons/button.png); width: 142px; height: 34px;">
        <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image: url(<?php echo $template_path ?>/images/global/buttons/button_hover.png); visibility: hidden; z-index: 1;"></div>
        <div style="background-image: url(<?php echo $template_path ?>/images/global/buttons/_sbutton_get_tibia_coins.png); 
                      background-repeat: no-repeat; 
                      background-position: center; 
                      width: 142px; 
                      height: 34px; 
                      position: absolute; 
                      top: 0; 
                      left: 0; 
                      z-index: 2; 
                      pointer-events: none;">
          </div>

          <input class="BigButtonText" 
                 type="submit" 
                 value="" 
                 style="width: 142px; 
                        height: 34px; 
                        border: 0; 
                        background: transparent; 
                        position: relative; 
                        z-index: 3; 
                        cursor: pointer;
                        display: block;">
        </div>
      </div>
    </form>
  </div>
  
  <div id="PremiumBoxButtonDecor" style="background-image:url(<?php echo $template_path ?>/images/themeboxes/premium/button_tibia_coins.png);"></div>
</div>