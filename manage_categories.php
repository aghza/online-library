<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * FROM category where id=".$_GET['id']);
	if($qry->num_rows > 0){
		foreach($qry->fetch_array() as $k => $v){
			$meta[$k] = $v;
		}
	}
}
?>


</head>
<body>
    <div class="search-bar admin-search">
        <form action="" method='post'>
            <input type="search" name='search' placeholder='Search by Category Name' required>
            <button type='submit' name='submit'><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="request-table">
        <div class="request-container">
            <h2 class="request-title student-info-title">List of Categories</h2>
            <?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM category where categoryname like '%$_POST[search]%'; ");
			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Categories found. Try searching again";

			}
			else
			{
				echo "<table class='rtable authortable'>";
                echo "<tr style='background-color: teal;'>";
                //Table header
                echo "<th>"; echo "Category ID"; echo "</th>";
                echo "<th>"; echo "Category Name"; echo "</th>";
                echo "<th>"; echo "Action"; echo "</th>";
                echo "</tr>";

                while($row=mysqli_fetch_assoc($q))
                {
                    echo "<tr>";
                    echo "<td>"; echo $row['categoryid']; echo "</td>";
                    echo "<td>"; echo $row['categoryname']; echo "</td>";
                    echo "<td>";?><a href="edit_category.php?ed=<?php echo $row['categoryid'];?>"><button style="font-weight:bold;" type="submit" name="submit1" class="btn btn-default actionbtn"><i class="fas fa-edit"></i> Edit
			        </button>
                    </a>
                    <a href="delete_category.php?del=<?php echo $row['categoryid'];?>"><button onclick="del()" style="font-weight:bold;" type="submit" name="submit1" class="delbtn" ><i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </a>
			        <?php 
			        echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
		    }
		}
			//if button is not pressed
		else
		{
			$res=mysqli_query($db,"SELECT * FROM category; ");
            echo "<table class='rtable authortable'>";
                echo "<tr style='background-color: teal;'>";
                //Table header
                echo "<th>"; echo "Category ID"; echo "</th>";
                echo "<th>"; echo "Category Name"; echo "</th>";
                echo "<th>"; echo "Action"; echo "</th>";
                echo "</tr>";

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['categoryid']; echo "</td>";
                echo "<td>"; echo $row['categoryname']; echo "</td>";
                echo "<td>";?><a href="edit_category.php?ed=<?php echo $row['categoryid'];?>"><button style="font-weight:bold;" type="submit" name="submit1" class="btn btn-default actionbtn"><i class="fas fa-edit"></i> Edit
                </button>
                </a>
                <a href="delete_category.php?del=<?php echo $row['categoryid'];?>"><button onclick="del()" style="font-weight:bold;" type="submit" name="submit1" class="delbtn"><i class="fas fa-trash-alt"></i> Delete
                </button></a>
                
                <?php 
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";

            }
        ?> 
        </div>
    </div>
    <!-- <div class="footer">
        <div class="footer-row">
            <div class="footer-left">
                <h1>LIBRARY  MANAGEMENT</h1>
                <p><i class="far fa-clock"></i>BOOKS</p>
                <p><i class="far fa-clock"></i>ADMIN</p>
            </div>
            <div class="footer-right">
                <h1>contact</h1>
                <p>moroco | had soualem | alf sahel |<i class="fas fa-map-marker-alt"></i></p>
                <p>s.aghzaf14@gmail.com<i class="fas fa-paper-plane"></i></p>
                <p>+212 661247974<i class="fas fa-phone-alt"></i></p>
            </div>
        </div>
        <div class="social-links">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-youtube"></i>
            <p>&copy; 2022 Copyright by | ADAM AGHZAF |</p>
        </div>
    </div> -->
    <!-- <script>
        function del(){
            var proceed = confirm("Are you sure want to delete?");
            if(proceed){
                window.location="delete_author.php";
            }
            else{
                window.location="manage_authors.php";
            }
        }
    </script> -->
</body>
</html>