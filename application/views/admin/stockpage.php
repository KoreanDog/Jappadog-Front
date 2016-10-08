<center>
<ul class="nav nav-tabs">
  <li><a href="/admin/supplies">SUPPLIES</a></li>
  <li><a href="/admin/recipes">RECIPES</a></li>
  <li><a href="/admin/stock">STOCK</a></li>
  <h2><b>{subtitle}</b></h2>
  <table class="table col-lg-12 col-centered">

  			<tr>
        <td class="text-center"><b>ID</b></td><td class="text-center"><b>NAME</b></td><td class="text-center"><b>QUANTITY</b></td><td class="text-center"><b>DESCRIPTION</b></td><td class="text-center"><b>PRICE</b></td><td class="text-center"><b>EDIT</b></td><td class="text-center"><b>DELETE</b></td>
        </tr>
            {stock}
            <tr>
                <td class="text-center">{id}</td><td class="text-center">{name}</td><td class="text-center">{quantity}</td><td class="text-center">{description}</td><td class="text-center">${price}</td><td class="text-center"><a href="stock/edit/{id}">EDIT</a></td><td class="text-center"><a href="stock/delete/{id}">DELETE</a></td>
            </tr>
            {/stock}
        </table>
</ul>
</center>