<x-layout>
  <div class="container maincontainer py-2">
    <h1 class="fw-bold text-center mb-4 cursivefont">Our Products</h1>
        <div class="container menubox" style="padding: 8%;">   
          <x-menu-card :menu="$menu" :limit=0 :withCategory=TRUE />
        </div>
    </div>
  </div>
</x-layout>