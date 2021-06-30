<!-- Make Event modal -->
<div class="modal fade" id="Make__Event__Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row modal__row">
                    <div class="col-md-10 mx-auto">
                        <div class="alert alert-danger" id="event_error" role="alert"></div>
                        <form id="make__event__modal" method="POST">

                            <div class="form-group">
                                <input type="hidden" value="<?php echo $userid; ?>" id="event_user_id" class="form-control" name="event_user_id" placeholder="User ID">
                                <small id="event_user_idError" class="text-danger"></small>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" id="event_title" name="event_title" class="form-control" placeholder="Event Title">
                                    <small class="text-danger " id="event_titleError" style="text-align: center;"></small>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="event_speaker" name="event_speaker" class="form-control" placeholder="Event Speaker">
                                    <small class="text-danger" id="event_speakerError"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <textarea name="event_description" id="event_description" class="form-control" placeholder="Event Description"></textarea>
                                    <small class="text-danger" id="event_descriptionError"></small>
                                </div>
                                <div class="col-sm-6">
                                    <textarea name="event_location" id="event_location" class="form-control" cols="1" rows="1" placeholder="Event Location"></textarea>
                                    <small class="text-danger" id="event_locationError"></small>
                                </div>
                            </div>

                            <!-- start time picker -->
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <small>Start Time</small>
                                    <div class="input-group date" id="startTime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="starttimepicker" name="starttimepicker" data-target="#startTime" />
                                        <div class="input-group-append" data-target="#startTime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="text-danger" id="start_timeError"></small>
                                </div>
                                <!-- End -->
                                <div class="col-sm-6">
                                    <small>End Time</small>
                                    <div class="input-group date" id="endTime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" id="endtimepicker" name="endtimepicker" data-target="#endTime" />
                                        <div class="input-group-append" data-target="#endTime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="text-danger" id="end_timeError"></small>
                                </div>
                            </div>

                            <!-- end time picker -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="make__event__Btn">Save changes</button>
            </div>
        </div>
    </div>
</div>