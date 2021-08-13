@php
    
@endphp

<div class="modal fade" id="favorite{{$x}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content playfairfont">
        <div class="modal-body">
            <h1 class="text-center fw-bold py-3 text-danger">Add this item to your favorites?</h1>
        </div>
        <div class="d-flex justify-content-center pb-4">
            <form action="/favorites" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="hidden" name="status" value="add">
                <button type="submit" class="btn nav-link fw-bold me-3">Confirm</button>
            </form>
            <a data-bs-dismiss="modal" class="btn nav-link fw-bold ms-3">Cancel</a>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unfavorite{{$x}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content playfairfont">
        <div class="modal-body">
            <h1 class="text-center fw-bold py-3 text-danger">Remove this item from your favorites?</h1>
        </div>
        <div class="d-flex justify-content-center pb-4">
            <form action="/favorites" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="hidden" name="status" value="remove">
                <button type="submit" class="btn nav-link fw-bold me-3">Confirm</button>
            </form>
            <a data-bs-dismiss="modal" class="btn nav-link fw-bold ms-3">Cancel</a>
        </div>
        </div>
    </div>
</div>