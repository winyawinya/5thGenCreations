<x-layout>
  <div class="p-5 bg-secondary">
    <h1 class="fw-bold text-center m-3 gagalinfont">Products</h1>
  </div>
  <div class="container-fluid productpage py-2 px-5">
        <x-menu-card :menu="$menu" :limit=0 :withCategory=TRUE :faves=$faves :alternate=FALSE />
    </div>
  </div>
</x-layout>