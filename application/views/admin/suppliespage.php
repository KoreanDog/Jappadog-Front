<center>
<ul class="nav nav-tabs">
  <li><a href="/admin/supplies">SUPPLIES</a></li>
  <li><a href="/admin/recipes">RECIPES</a></li>
  <li><a href="/admin/stock">STOCK</a></li>
  <h2><b>{subtitle}</b></h2>
  <table class="table col-lg-12 col-centered">
        <a class="btn btn-default" role="button" href="/admin/addsupply">Add Supply</a>
  			<tr>
            <td class="text-center"><b>ID</b></td>
            <td class="text-center"><b>NAME</b></td>
            <td class="text-center"><b>IN STOCK</b></td>
            <td class="text-center"><b>RECEIVING</b></td>
            <td class="text-center"><b>MEASUREMENT</b></td>
            <td class="text-center"><b>EDIT</b></td>
        </tr>

        {supplies}

        <tr>
            <td class="text-center">{id}</td>
            <td class="text-center">{name}</td>
            <td class="text-center">{instock} units</td>
            <td class="text-center">{receiving}</td>
            <td class="text-center">{measurement}</td>
            <td class="text-center"><a class="btn btn-default" role="button" href="editsupplies/{id}">EDIT</a></td>
        </tr>

        {/supplies}

        </table>
</ul>
</center>