<div class="modal fade " id="deleteBackdrop_{{ $product->id}}"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Suppression du produit : {{ $product->title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>L'action est irréversible.</p>
            <p>Êtes vous sur de vouloir supprimer le produit ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <form action="{{ route('admin.product.destroy', $product)}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        </div>
    </div>
</div>
