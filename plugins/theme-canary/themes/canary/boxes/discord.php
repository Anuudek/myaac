<div class="Themebox" style="background-image:url(<?php echo $template_path; ?>/images/themeboxes/discord/discord_box.png); height: 204px; position: relative;">
  
  <div id="DiscordBoxButton" style="position: absolute; top: 72%; left: 50%; transform: translate(-50%, -50%);">
    <a href="<?= $config['discord_link']; ?>" target="_blank" style="text-decoration: none; display: block;">
      <div class="BigButton" style="background-image:url(<?php echo $template_path ?>/images/global/buttons/button.png); width: 142px; height: 34px;">
        <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image: url(<?php echo $template_path ?>/images/global/buttons/button_hover.png); visibility: hidden; z-index: 1"></div>
        <div style="background-image: url(<?php echo $template_path ?>/images/global/buttons/_sbutton_discord.png); 
                      background-repeat: no-repeat; 
                      background-position: center; 
                      width: 142px; 
                      height: 34px; 
                      position: absolute; 
                      top: 0; 
                      left: 0; 
                      z-index: 1; 
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
                        z-index: 1; 
                        cursor: pointer;
                        display: block;">
        </div>
      </div>
    </form>
  </div>

</div>


