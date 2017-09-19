            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
<!--                  <h3 class="box-title"><b>Prerequisites</b></h3>
-->                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
					<?php $result3 = mysqli_query($con,$sql3) or die ('querry failed');
                      while($row3 = mysqli_fetch_array($result3)){?>
                    <div class="panel box box-default box-solid">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a class="collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#<?php printf($row3['subject_name']); ?>">
                           <?php printf($row3['subject_name']); ?>
                          </a>
                        </h4>
                      </div>
                      <div style="height: 0px;" aria-expanded="false" id="<?php printf($row3['subject_name']); ?>" class="panel-collapse collapse">
                        <div class="box-body">
                          <?php printf($row3['subject_name']); ?> content.
                        </div>
                      </div>
                    </div>
					<?php }?>
                    
                  </div> <!-- /.box-group -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			</div>