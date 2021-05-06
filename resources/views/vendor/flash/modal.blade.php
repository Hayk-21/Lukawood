<div id="flash-overlay-modal"  tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" class="modal fade {{ $modalClass or '' }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">{{ $title }} <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>

            </div>
            <div class="modal-body">
                <p>{!! $body !!}</p>
            </div>
        </div>
    </div>
</div>
