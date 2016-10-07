<div class="row row-centered">
  <div class="table-responsive">
    <table class="table-striped col-lg-12 col-centered">
      <tr>
        <th>Ingredient</th>
        <th class="text-center">In Stock</th>
        <th class="text-center">Order Quantity</th>
        <th class="text-center">Order Measurment</th>
      </tr>
        {ingredients}
      <tr>
        <td>{name}</td>
        <td class="text-center">{instock} units</td>
        <td class="text-center">{receiving} boxes</td>
        <td class="text-center">{measurement} units/box</td>
      </tr>
        {/ingredients}
    </table>
  </div>
</div>
