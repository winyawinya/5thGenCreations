<x-layout>
  <div class="container maincontainer py-2">
    <h1 class="fw-bold text-center mt-5 cursivefont">Our Products</h1>
        <div class="container menubox p-5">   
          <x-menu-card :menu="$menu" :limit=0 :withCategory=TRUE />
        </div>
    </div>
  </div>
</x-layout>