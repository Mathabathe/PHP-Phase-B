<style type="text/css">
<!--
body,td,th {
	color: #0000FF;
}
body {
	background-color: #FFFF99;
}
-->
</style><?php
require("connect_to_mysql.php");
class sql_commands extends Connect
{
		private $db;
		
	//checks if the person's is username, password and a privilage option that the admin exist. if they do it sends an admin privilege to admin.class.php  
	function login($username,$password,$priv)		
	{
		$this->db=Connect::connect();
		
		$msg="";
		
		$query="select * from admin where username='$username' and password='$password' and privilages='$priv' LIMIT 1";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row==1)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$msg=$rows['privilages'];
			}
		}
		return $msg;
	}
	
	//the method records the new product in the database and generate the id of the product store and return it to add_product.class.php 
	function add_pro($name,$price,$descrip,$category,$subcategory)
	{
		$rows;
		
		$this->db=Connect::connect();
			
		$query="insert into products values(null,'$name','$price','$descrip','$category','$subcategory')";
		$result=$this->db->query($query);
		$rows=mysqli_insert_id($this->db);	
	
	
	return $rows;
	}
	
	//selects all products that exists within the products
	function select_all_products()
	{
		$msg="";
		$this->db=Connect::connect();
		$query="select id, product_name from products";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$id=$rows['id'];
				$pro=$rows['product_name'];
				
				$msg.=$id." ".$pro." "."<a href='edit.php?edit=$id'>edit</a> <a href='Product_inventory.php?delete=$id'>Delete</a>"."<br/>";
			}
		}
		return $msg;
	}
	
	function delete($id)
	{
		$this->db=Connect::connect();
		$query="delete from product_inventory where id='$id'";
		$result=$this->db->query($query);		
	}
	
	//select the information based on the product selected, in which the method recieve a product id, searches the information and returns them
	function select_for_editing($id)
	{
		$arr_product="";
		$this->db=Connect::connect();
		$query="select * from product_inventory where id='$id'";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$arr_product_inventory[0]=$rows['product_name'];
				$arr_product[1]=$rows['product_type'];
				$arr_product[2]=$rows['price'];
				$arr_product[3]=$rows['details_text'];
				$arr_product[4]=$rows['category'];
				$arr_product[5]=$rows['subcategory'];
				$arr_product[6]=$rows['id'];
				       
				
			}
		}
		return $arr_product_inventory;
	}
	
	//the method updates the changes made on the products
	function edit_rec($name,$price,$descrip,$category,$subcategory,$id)
	{
	
		$this->db=Connect::connect();
		$query="update products set product_name='$name',price='$price',details_text='$descrip',category='$category',subcategory='$subcategory' where id='$id'";
		$result=$this->db->query($query);	
		
	}
	
	function select_for_music()
	{
		$ad_novels="";
		$id="";
		$prod="";
		$price="";
		
	$this->db=Connect::connect();
		$query="select * from product_inventory";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$=$rows['category'];
				if($games=="music")
				{
					$id=$rows['id'];
					$prod=$rows['product_name'];
					$price=$rows['price'];
									$ad_novels.='<table border="0" cellspacing="0" cellpadding="6">
	<tr>			
		<td width="17%" valign="top"><a href="product.php?id='.$id.'"><img style="border:#666 1px solid;" src="proImages/'.$id.'.jpg" height="102" border="1" /></a></td>
		<td valign="top">'.$prod.'<br/> R'.$price.'<br/>
		<a href="product.php?id='.$id.'">View Product</a>
		</tr> 		
				</table>';     
				}
			
  
				
			}
		}
		return $ad_novels;
	}
	
	//select a product based on the category in which it falls under
	function select_for_games()
	{
		$ad_motivational="";
		$id="";
		$prod="";
		$price="";
		
		$this->db=Connect::connect();
		$query="select * from products";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$movie=$rows['category'];
				if($movie=="games")
				{
					$id=$rows['id'];
					$prod=$rows['product_name'];
					$price=$rows['price'];
									$ad_motivational.='<table border="0" cellspacing="0" cellpadding="6">
	<tr>			
		<td width="17%" valign="top"><a href="product.php?id='.$id.'"><img style="border:#666 1px solid;" src="proImages/'.$id.'.jpg" height="102" border="1" /></a></td>
		<td valign="top">'.$prod.'<br/> R'.$price.'<br/>
		<a href="product.php?id='.$id.'">View Product</a>
		</tr> 		
				</table>';     
				}
			
  
				
			}
		}
		return $ad_motivational;
	}
	
	//select a product based on the category in which it falls under
	function select_for_movies()
	{
		$ad_motivational="";
		$id="";
		$prod="";
		$price="";
		
		$this->db=Connect::connect();
		$query="select * from Product_inventory";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$movie=$rows['category'];
				if($movie=="Char")
				{
					$id=$rows['id'];
					$prod=$rows['product_name'];
					$price=$rows['price'];
									$ad_motivational.='<table border="0" cellspacing="0" cellpadding="6">
	<tr>			
		<td width="17%" valign="top"><a href="product.php?id='.$id.'"><img style="border:#666 1px solid;" src="proImages/'.$id.'.jpg" height="102" border="1" /></a></td>
		<td valign="top">'.$prod.'<br/> R'.$price.'<br/>
		<a href="product.php?id='.$id.'">View Product</a>
		</tr> 		
				</table>';     
				}
			
  
				
			}
		}
		return $ad_motivational;
	}
	
	//select a product based on the category in which it falls under
	function view_specific_product($id)
	{
		$this->db=Connect::connect();
		$display="";
		$query="select * from Product_inventory where id='$id'";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$product=$rows['product_name'];
				$price=$rows['price'];
				$details=$rows['details_text'];
				$category=$rows['category'];
				$subcategory=$rows['subcategory'];  
				$display=$product."<br/></br/> R".$price."<br/></br/>".$details."<br/></br/>".$category."<br/></br/>".$subcategory;  
				
			}
		}
		return $display;	
	}
	
	//method retrieves all the information that is stored in session and returns
	function shopping_cart($id)
	{
		$this->db=Connect::connect();
		$output="";
		$query="select * from products where id=$id";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$product=$rows['product_name'];
				$price=$rows['price'];
				$details=$rows['details_text'];
				$category=$rows['category'];
				$subcategory=$rows['subcategory']; 
				
				$output.="<tr>";
				$output.="<td><a href=./product.php?id=$id>$product</a><br/><img src=\"proImages/$id.jpg\" alt=\"$product\" width=\"40\" height=\"52\" border=\"1\" </td>";
				$output.="<td>".$details."</td>";
				$output.="<td>".$price."</td>";
				$output.="<td>".$category."</td>";
				$output.="<td>".$subcategory."</td>";
						
				
			}
		}
		return $output;
	}
	
	//method calculates the total cost tha a user must pay after making a purchase
	function total_cost($id,$value)
	{
		$this->db=Connect::connect();
		$output="";
		$subtotal="";
		$total="";
		$query="select * from products where id=$id";
		$result=$this->db->query($query);	
		$num_row=$result->num_rows;
		
		if($num_row>0)
		{
			for($a=0; $a<$num_row; $a++)
			{
				$rows=$result->fetch_assoc();
				$price=$rows['price'];
				$subtotal=$value*$price;
			}
			//$total+=$subtotal;
		}
		return $subtotal;
	}
	
	//search through the productstable to check whether a product is existance or not
	function search($search)
	{
		$this->db=Connect::connect();
		$search_result=0;
		$query="select * from products where product_name='$search'";
		$result=$this->db->query($query);
		$numRows=$result->num_rows;
		
		for($a=0;$a<$numRows;$a++)
		{
			$rows=$result->fetch_assoc();
			$search_result=$rows['id'];
				
		}
		
		return $search_result;
		
	}
	
	//register new user
	function register($name,$surname,$address,$email,$password,$id)
	{
		$this->db=Connect::connect();
		$error=0;
		$query="select * from customer where email='$email'";
		$result=$this->db->query($query);
		$numRows=$result->num_rows;
		
		if($numRows >0)
		{
			$error=$numRows;
		}
		else
		{
			$query="insert into customer values(null,'".$name."','".$surname."','".$address."','".$email."','".$password."','".$id."')";
			$result=$this->db->query($query);	
		}
		
		return $error;
	}
	
	//checks whether the user input is exists in the database
	function user_login($email,$password)
	{
		$id=0;
		$this->db=Connect::connect();
				$query="select * from customer where email='$email' and password='$password' LIMIT 1";
		$result=$this->db->query($query);
		$num_row=$result->num_rows;	
		if($num_row==1)
		{
			$row=$result->fetch_assoc();
			$id=$row['user_id'];
		}
		return $id;

	}
	
	//The method stores an order
	function captureOrder($id,$total_cost,$total)
	{
	
		$this->db=Connect::connect();
		
		$date=date('H:i, jS F Y');
		$query="insert into orders values(null,'".$id."','".$total_cost."','".$total."','".$date."')";
		$result=$this->db->query($query);	
		
		return $new_id=mysqli_insert_id($this->db);
	
	}
	
	//The method gets all information/ transactions, orders and products that a user purchased
	function getStatus($id_num)
		{
			$status="";
			$name="";
			$surname="";
			$id_number="";
			$total_payed="";
			$date="";
			$this->db=Connect::connect();
			$query="select id_number from customer where id_number='$id_num'";
			$result=$this->db->query($query);
			$numRows=$result->num_rows;
			
			if($numRows >0)
			{
				$query="select u.name, surname, id_number,o.order_id,amout_payed,item_name, date from users u, orders o, items i  where u.user_id=o.user_id and o.order_id=i.order_id and id_number='$id_num'";	
				$result=$this->db->query($query);
				$numRows=$result->num_rows;
				
				for($x=0; $x<$numRows; $x++)
				{
					$rows=$result->fetch_assoc();
					$name=$rows['name'];
					$surname=$rows['surname'];
					$id_number=$rows['id_number'];	
					$order_id=$rows['order_id'];
					$amout_payed=$rows['amout_payed'];
					$item_name=$rows['item_name'];
					$date=$rows['date'];
					$total_payed+=$amout_payed;
	$status.="Order_id: ".$order_id."<br/ >"."Amount_payed: ".$amout_payed."<br/ >"."Items_Name: ".$item_name."<br/ >".$date."<br/ ><br />";

				}
			}
			return "<br/>Name: ".$name."<br/ >"."Surname: ".$surname."<br/ >"."id_number: ".$id_number."<br/ >"."<br/> <br/>".$status."<br/ ><br />"."Total Amount Payed: R".$total_payed;
		}
	
	//The method selects all admins in a admin table and return them in a form called customer_list
	function getAllAdmin()
	{
		$admin_details="";
		$id="";
		$this->db=Connect::connect();
		$query="Select id, username, privilages from admin where privilages='admin'"	;
		$result=$this->db->query($query);
		$numRows=$result->num_rows;
		
		if($numRows>0)
		{
			for($x=0; $x<$numRows; $x++)
			{
				$row=$result->fetch_assoc();
				$id=$row['id'];
				$username=$row['username'];
				$privilages=$row['privilages'];
				
				$admin_details.=$username." ".$privilages."  "."<a href=customer_list.php?delAdmin=$id>Remove Admin</a>"."<br/><br/>";    
			}
		}
		return $admin_details;
	}
	
	//The method selects all customers in a users table and return them in a form called customer_list
	function getAllCustomers()
	{
		$user_details="";
		$id="";
		$this->db=Connect::connect();
		$query="Select user_id, name, surname, address,email from users"	;
		$result=$this->db->query($query);
		$numRows=$result->num_rows;
		
		if($numRows>0)
		{
			for($x=0; $x<$numRows; $x++)
			{
				$row=$result->fetch_assoc();
				$id=$row['user_id'];
				$name=$row['name'];
				$surname=$row['surname'];
				$address=$row['address'];
				$email=$row['email'];
				
				$user_details.=$name." ".$surname."  ".$address."  ".$email."  "."<a href=customer_list.php?del=$id>Remove User</a> - <a href=mail.php?mail_id=$id>Send Mail</a>"."<br/><br/>";    
			}
		}
		return $user_details;
	}
	
	//The method stores the order_id, and product name in a table called items which keep track of products a specific selected
	function order_item($order_id,$session)
	{
		$product_name="";
		foreach($session as $name =>$value)
		{
			if($value>0)
			{
				if(substr($name,0,5)=="cart_")
				{
					$id=substr($name,5,(strlen($name)-5));
					$query="select * from products where id=$id";
					$result=$this->db->query($query);
					$rows=$result->fetch_assoc();
					$product_name=$rows['product_name'];
					
					$insertQuery="insert into items values('".$order_id."','"."null"."','".$product_name."')";
					$insertResult=$this->db->query($insertQuery);
				}
				
				
			}
		
	
		}
		
	}
	
	//The method gets the email and return it in a form called mail which will populate a field called to with your email
	function getEmail($id)
	{
		$this->db=Connect::connect();
		$email="";
		$query="select email from users where user_id='$id'";
		$result=$this->db->query($query);
		$num_row=$result->num_rows;	
		
		if($num_row>0)
		{
			$row=$result->fetch_assoc();
			$email=$row['email'];
		}
		return $email;

			
	}
	
	//The method delete an user in a database
	function deleteUser($id)
	{
		$this->db=Connect::connect();
		$query="delete from users where user_id='$id'";
		$result=$this->db->query($query);	
	}
	
	//The method delete an admin in a database
	function deleteAdmin($id)
	{
		$this->db=Connect::connect();
		$query="delete from admin where id='$id'";
		$result=$this->db->query($query);	
	}
	
	//The method register a new admin in the database
	function add_admin($username, $password,$privilages)
	{
		$this->db=Connect::connect();
		$query="insert into admin values(null,'".$username."','".$password."','".$privilages."')";
		$result=$this->db->query($query);			
	}

}

?>