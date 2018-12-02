

   	<form id="search-form" action="" method="POST" enctype="multipart/form-data" >
   	<div class="form-row align-items-center container">
      <div class="form-group col-sm-3 col-xs-6">
        <select data-filter="type" class="filter-type filter form-control">
          <option value="">catégories</option>
          <option value="1">salle de fete</option>
          <option value="2">troupe</option>
        </select>
      </div>
      <div class="form-group col-sm-3 col-xs-6">
        <select data-filter="make" class="filter-make filter form-control">
          <option value="">Région</option>
          <option value="1">Tunis</option>
          <option value="2">Bizerte</option>
          <option value="3">Hammamet</option>
        </select>
      </div>
      <div class="form-group col-sm-3 col-xs-6">
        <select data-filter="model" class="filter-model filter form-control">
          <option value="">budget</option>
          <option value="1">1000dt à 2000dt</option>
          <option value="2">2000dt à 4000dt</option>
        </select>
      </div>

      <div class="form-group col-sm-3 col-xs-6">
       
         <input id="date" type="date" class="filter-price filter form-control">
        
      </div>

      <div class="form-group col-xs-3">
        <button type="submit" class="btn btn-block btn-primary">Search</button>

</div>
</div>
    </form>
   