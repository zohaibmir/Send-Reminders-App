<div id="psdgraphics-com-table">
                <div id="psdg-header">
                    <span class="psdg-bold">Existing Reminders</span><br />
                    <span><a class="rlink" href="index.php" style="padding-left: 50px;font-weight: bold">Show All Reminders</a></span>
                    <span><a class="rlink" href="index.php?remType=active" style="padding-left: 50px;font-weight: bold">Show Active Reminders</a></span>
                    <span><a class="rlink" href="index.php?remType=expired" style="padding-left: 50px;font-weight: bold">Show Expired Reminders</a></span>
                </div>
                <div id="psdg-top">
                    <div class="psdg-top-cell" style="text-align:left; padding-left: 24px;">Reminder Description</div>
                    <div class="psdg-top-cell">Email</div>
                    <div class="psdg-top-cell">ExpiryDate</div>
                    <div class="psdg-top-cell">Edit</div>
                    <div class="psdg-top-cell" style="border:none;">Delete</div>
                </div>
                <div id="psdg-middle">
                    <?php 
                     foreach ($arr as $v1) {                                                                     
                    ?>
                    <div class="psdg-left"><?php echo $v1->getReminderName(); ?></div>
                    <div class="psdg-right"><?php echo $v1->getEmailId(); ?></div>
                    <div class="psdg-right"><?php echo $v1->getExpiryDate();?></div>
                    <div class="psdg-right"><a class="rlink" href="edit.php?id='<?php echo $v1->getReminderId();?>'">Edit</a></div>
                    <div class="psdg-right"><a class="rlink" href="delete.php?id='<?php echo $v1->getReminderId();?>'">Delete</a></div>
                    <?php } ?>
                    <div id="psdg-bottom">
                        <div class="psdg-bottom-cell" style="width:129px; text-align:left; padding-left: 24px;"></div>
                        <div class="psdg-bottom-cell"></div>
                        <div class="psdg-bottom-cell"></div>
                        <div class="psdg-bottom-cell"></div>
                        <div class="psdg-bottom-cell" style="border:none;"></div>
                    </div>
                </div>
            </div>
