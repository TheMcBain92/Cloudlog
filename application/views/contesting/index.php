<div class="container qso_panel contesting">
    <button type="button" class="btn btn-sm btn-warning float-end" onclick="reset_contest_session()"><i class="fas fa-sync-alt"></i> <?php echo lang('contesting_button_reset_contest_session'); ?></button>
    <h2 style="display:inline"><?php echo lang('contesting_page_title'); ?> </h2> <?php echo ($_GET['manual'] == 0 ? " <span style='display:inline' class='align-text-top badge text-bg-success'>LIVE</span>" : " <span style='display:inline' class='align-text-top badge text-bg-danger'>POST</span>");  ?>
    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="qso_input" name="qsos">
                        <div class="mb-3 row">
							<label class="col-auto control-label" for="radio"><?php echo lang('contesting_exchange_type'); ?></label>

							<div class="col-auto">
								<select class="form-select form-select-sm" id="exchangetype" name="exchangetype">
									<option value='None'><?php echo lang('contesting_exchange_type_none'); ?></option>
									<option value='Exchange'><?php echo lang('contesting_exchange_type_exchange'); ?></option>
									<option value='Gridsquare'><?php echo lang('contesting_exchange_type_gridsquare'); ?></option>
									<option value='Serial'><?php echo lang('contesting_exchange_type_serial'); ?></option>
									<option value='Serialexchange'><?php echo lang('contesting_exchange_type_serial_exchange'); ?></option>
									<option value='Serialgridsquare'><?php echo lang('contesting_exchange_type_serial_gridsquare'); ?></option>
								</select>
							</div>

                            <label class="col-auto control-label" for="contestname"><?php echo lang('contesting_contest_name'); ?></label>

                            <div class="col-auto">
                                <select class="form-select form-select-sm" id="contestname" name="contestname">
									<?php foreach($contestnames as $contest) {
										echo "<option value='" . $contest['adifname'] . "'>" . $contest['name'] . "</option>";
									} ?>
                                </select>
                            </div>

                            <label class="col-auto control-label" for="operatorcall"><?php echo lang('contesting_operator_callsign'); ?></label>
                            <div class="col-auto">
                                <input type="text" class="form-control form-control-sm" id="operator_callsign" name="operator_callsign" value='<?php echo $this->session->userdata('operator_callsign'); ?>' required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-2">
                                <label for="start_date"><?php echo lang('general_word_date'); ?></label>
                                <input type="text" class="form-control form-control-sm input_date" name="start_date" id="start_date" value="<?php if (($this->session->userdata('start_date') != NULL && ((time() - $this->session->userdata('time_stamp')) < 24 * 60 * 60))) { echo $this->session->userdata('start_date'); } else { echo date('d-m-Y');}?>" <?php echo ($_GET['manual'] == 0 ? "disabled" : "");  ?> >
                            </div>

                            <div class="mb-3 col-md-1">
                                <label for="start_time"><?php echo lang('general_word_time'); ?></label>
                                <input type="text" class="form-control form-control-sm input_time" name="start_time" id="start_time" value="<?php if (($this->session->userdata('start_time') != NULL && ((time() - $this->session->userdata('time_stamp')) < 24 * 60 * 60))) { echo substr($this->session->userdata('start_time'),0,5); } else { echo $_GET['manual'] == 0 ? date('H:i:s') : date('H:i'); } ?>" size="7" <?php echo ($_GET['manual'] == 0 ? "disabled" : "");  ?> >
                            </div>

                            <?php if ( $_GET['manual'] == 0 ) { ?>
                              <input class="input_time" type="hidden" id="start_time"  name="start_time"value="<?php echo date('H:i'); ?>" />
                              <input class="input_date" type="hidden" id="start_date" name="start_date" value="<?php echo date('d-m-Y'); ?>" />
                            <?php } ?>

                            <div class="mb-3 col-md-2">
                                <label for="mode"><?php echo lang('gen_hamradio_mode'); ?></label>
                                <select id="mode" class="form-select mode form-select-sm" name="mode">
                                    <?php foreach($modes->result() as $mode) {
                                            if ($mode->submode == null) {
                                                printf("<option value=\"%s\" %s>%s</option>", $mode->mode, $this->session->userdata('mode')==$mode->mode?"selected=\"selected\"":"",$mode->mode);
                                            } else {
                                                printf("<option value=\"%s\" %s>&rArr; %s</option>", $mode->submode, $this->session->userdata('mode')==$mode->submode?"selected=\"selected\"":"",$mode->submode);
                                            }
                                    } ?>
                                </select>
                            </div>

                            <div class="mb-3 col-md-2">
                                <label for="band"><?php echo lang('gen_hamradio_band'); ?></label>

                                <select id="band" class="form-select form-select-sm" name="band">
                                <?php foreach($bands as $key=>$bandgroup) {
                                    echo '<optgroup label="' . strtoupper($key) . '">';
                                    foreach($bandgroup as $band) {
                                        echo '<option value="' . $band . '"';
                                        if ($this->session->userdata('band') == $band) echo ' selected';
                                        echo '>' . $band . '</option>'."\n";
                                    }
                                    echo '</optgroup>';
                                    }
                                ?>
                                </select>
                            </div>

                            <div class="mb-3 col-md-2">
                                <label for="frequency"><?php echo lang('gen_hamradio_frequency'); ?></label>
                                <input type="text" class="form-control form-control-sm" id="frequency" name="freq_display" value="<?php echo $this->session->userdata('freq'); ?>" />
                            </div>

                            <div class="mb-3 col-md-2">
                                <label for="inputRadio"><?php echo lang('gen_hamradio_radio'); ?></label>
                                <select class="form-select form-select-sm radios" id="radio" name="radio">
                                    <option value="0" selected="selected"><?php echo lang('general_word_none'); ?></option>
                                        <?php foreach ($radios->result() as $row) { ?>
                                        <option value="<?php echo $row->id; ?>" <?php if($this->session->userdata('radio') == $row->id) { echo "selected=\"selected\""; } ?>><?php echo $row->radio; ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label for="callsign"><?php echo lang('gen_hamradio_callsign'); ?></label>
                                <input type="text" class="form-control form-control-sm" id="callsign" name="callsign" required pattern="\S+" title="Whitespace is not allowed" tabindex="1">
                                <small id="callsign_info" class="badge text-bg-danger"></small>
                            </div>

                            <div class="mb-3 col-md-1">
                                <label for="rst_sent"><?php echo lang('gen_hamradio_rsts'); ?></label>
                                <input type="text" class="form-control form-control-sm" name="rst_sent" id="rst_sent" value="59" tabindex="2">
                            </div>

                            <div style="display:none" class="mb-3 col-md-1 serials">
								<label for="exch_serial_s"><?php echo lang('contesting_exchange_serial_s'); ?></label>
								<input type="number" class="form-control form-control-sm" name="exch_serial_s" id="exch_serial_s" value="" tabindex="3">
							</div>

                            <div style="display:none" class="mb-3 col-md-1 exchanges">
                                <label for="exch_sent"><?php echo lang('gen_hamradio_exchange_sent_short'); ?></label>
                                <input type="text" class="form-control form-control-sm" name="exch_sent" id="exch_sent" value="" tabindex="3">
                            </div>

							<div style="display:none" class="mb-3 col-md-2 gridsquares">
								<label for="exch_gridsquare_s"><?php echo lang('contesting_exchange_gridsquare_s'); ?></label>
								<input disabled type="text" class="form-control form-control-sm" name="exch_gridsquare_s" id="exch_gridsquare_s" value="<?php echo $my_gridsquare;?>" tabindex="-1">
							</div>

                            <div class="mb-3 col-md-1">
                                <label for="rst_rcvd"><?php echo lang('gen_hamradio_rstr'); ?></label>
                                <input type="text" class="form-control form-control-sm" name="rst_rcvd" id="rst_rcvd" value="59" tabindex="4">
                            </div>

                            <div style="display:none" class="mb-3 col-md-1 serialr">
								<label for="exch_serial_r"><?php echo lang('contesting_exchange_serial_r'); ?></label>
								<input type="number" class="form-control form-control-sm" name="exch_serial_r" id="exch_serial_r" value="" tabindex="5">
							</div>

							<div style="display:none" class="mb-3 col-md-1 exchanger">
								<label for="exch_rcvd"><?php echo lang('gen_hamradio_exchange_rcvd_short'); ?></label>
								<input type="text" class="form-control form-control-sm" name="exch_rcvd" id="exch_rcvd" value="" tabindex="5">
							</div>

							<div style="display:none" class="mb-3 col-md-2 gridsquarer">
								<label for="exch_gridsquare_r"><?php echo lang('contesting_exchange_gridsquare_r'); ?></label>
								<input type="text" class="form-control form-control-sm" name="locator" id="exch_gridsquare_r" value="" maxlength="8" tabindex="6">
							</div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-5">
                                <label for="name"><?php echo lang('general_word_name'); ?></label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" value="">
                            </div>

                            <div class="mb-3 col-md-5">
                                <label for="comment"><?php echo lang('general_word_comment'); ?></label>
                                <input type="text" class="form-control form-control-sm" name="comment" id="comment" value="">
                            </div>
                        </div>

                        <button type="button" class="btn btn-sm btn-secondary" onclick="reset_log_fields()"><i class="fas fa-sync-alt"></i> <?php echo lang('contesting_btn_reset_qso'); ?></button>
                        <button type="button" class="btn btn-sm btn-primary" onclick="logQso();"><i class="fas fa-save"></i> <?php echo lang('contesting_btn_save_qso'); ?></button>
                        <div class="mb-3 row">
                          <div class="col-md-12">
                              <div class="form-check-inline">
                                  <select class="form-select form-select-sm" id="copyexchangeto" name="copyexchangeto">
                                      <option value='None'><?php echo lang('contesting_copy_exch_to_none'); ?></option>
                                      <option value='dok'><?php echo lang('contesting_copy_exch_to_dok'); ?></option>
                                      <option value='name'><?php echo lang('contesting_copy_exch_to_name'); ?></option>
                                      <option value='age'><?php echo lang('contesting_copy_exch_to_age'); ?></option>
                                      <option value='state'><?php echo lang('contesting_copy_exch_to_state'); ?></option>
                                      <option value='power'><?php echo lang('contesting_copy_exch_to_power'); ?></option>
                                      <option value='locator'><?php echo lang('contesting_copy_exch_to_locator'); ?></option>
                                  </select>
                              </div>
                          </div>
                      </div>
                    </form>
                </div>
            </div>

            <br/>

            <!-- Callsign SCP Box -->
            <div class="card callsign-suggest">
                <div class="card-header"><h5 class="card-title"><?php echo lang('contesting_title_callsign_suggestions'); ?></h5></div>

                <div class="card-body callsign-suggestions"></div>
            </div>

            <!-- Past QSO Box -->
            <div class="card log">
                <div class="card-header"><h5 class="card-title"><?php echo lang('contesting_title_contest_logbook'); ?></h5></div>
                <p>

                <table style="width:100%" class="table-sm table qsotable table-bordered table-hover table-striped table-condensed text-center">
                    <thead>
                        <tr class="log_title titles">
                            <th><?php echo lang('general_word_date'); ?>/<?php echo lang('general_word_time'); ?></th>
                            <th><?php echo lang('gen_hamradio_call'); ?></th>
                            <th><?php echo lang('gen_hamradio_band'); ?></th>
                            <th><?php echo lang('gen_hamradio_mode'); ?></th>
                            <th><?php echo lang('gen_hamradio_rsts'); ?></th>
                            <th><?php echo lang('gen_hamradio_rstr'); ?></th>
                            <th><?php echo lang('gen_hamradio_exchange_sent_short'); ?></th>
                            <th><?php echo lang('gen_hamradio_exchange_rcvd_short'); ?></th>
							<th><?php echo lang('contesting_exchange_serial_s'); ?></th>
							<th><?php echo lang('contesting_exchange_serial_r'); ?></th>
							<th><?php echo lang('contesting_exchange_type_gridsquare'); ?></th>
							<th><?php echo 'VUCC ' . lang('contesting_exchange_type_gridsquare'); ?></th>
                        </tr>
                    </thead>

                    <tbody class="contest_qso_table_contents">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
?>
