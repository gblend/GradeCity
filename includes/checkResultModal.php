<?php
/**
 * Created by PhpStorm.
 * User: gblend
 * Date: 12/5/2019
 * Time: 9:43 AM
 */
echo '    <!--Check result modal-->
    <div class="modal" id="checkResultModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <h4 class="modal-title text-center">Supply Details for Result</h4>
                </div>
                <div class="modal-body">
                    <div id="checkResultMsg"></div>
                    <form id="checkResultForm" method="post" action="admin/includes/functions.php">
                        <div class="mb-3">
                            <div class="">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="small">Level</label>
                                        <select name="level_option" id="level_option" class="form-control">
                                            <option value="" selected hidden>Select Level</option>
                                            <option value="nd1">ND 1</option>
                                            <option value="nd2">ND 2</option>
                                            <option value="hnd1">HND 1</option>
                                            <option value="hnd2">HND 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="checkResultModal" value="checkResultModal">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="small">Session</label>
                                        <select name="semester_option" id="semester_option" class="form-control">
                                            <option value="" selected hidden>Select Semester</option>
                                            <option value="fs">First Semester</option>
                                            <option value="ss">Second Semester</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-center">
                            <button name="checkResultBtn" type="submit" class="btn btn-primary btn-block">Check Result</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';