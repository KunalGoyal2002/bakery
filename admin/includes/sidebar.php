<div class="sidebar">
  <a  href="index.php">Add Product</a>
  <a href="product-list.php">Product List</a>
  <a href="category.php">Add Category</a>
  <a href="category-list.php">Category List</a>
  <a href="orders.php">orders</a>

</div>

	
	<script>
$(document).ready(function() {
    $(".sidebar a").click(function() {
      // Remove "active" class from all menu items
      $(".sidebar a").removeClass("active");

      // Add "active" class to the clicked menu item
      $(this).addClass("active");

      // Store the active state in local storage
      localStorage.setItem("activeMenuItem", $(this).text());
    });

    // Retrieve the active state from local storage on page load
    var activeMenuItem = localStorage.getItem("activeMenuItem");
    if (activeMenuItem) {
      $(".sidebar a:contains('" + activeMenuItem + "')").addClass("active");
    }
  });
	</script>