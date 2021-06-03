<style>
#header1{
	background:skyblue;
}
.facilities{
    width:1080px;
    position:relative;
    background:#ebf7fa;
}
.facilities h1{
    color:#b18d13;
    text-transform: capitalize;
}
.top-image{
    width:100%;
    float:left;
}
.top-image img{
    height:400px;
    width:100%;
    float:left;
}
.facilities_content{
    bottom:20px;
    float:left;
	height:350px;
    width:333px;
    background:#ececec;
    margin-left:15px;
    margin-bottom:20px;
}
.facilities_content a{
    position:relative;
    float:right;
	font-size:14px;
	color:#b18d13;
    padding-bottom:5px;
    padding-right:10px;
}
.title{
    font-size:20px;
    margin:auto;
}
.facilities_content h1{
    font-size:18px;
	padding:10px 10px 0px 10px;
}
.description{
    padding:10px 0px 10px 20px;
}
.facilities_content p{
    text-transform: none;
	font-family: sans-serif;
	font-size: 12px;
	padding: 10px 0px 0px 20px;
    color:#999;
    width:290px;
    float:left;
	text-indent: justify;
}
.facilities_content img{
    height:200px;
    width:333;
}
</style>
<?php include("header1.php"); 
    include("db_connect.php"); ?>
<div class="facilities">
	<center><h1>facilities and services</h1></center>
    <?php $query="SELECT * FROM facilities";
        $flag=0;
        $result=mysqli_query($connection,$query);
        while($count=mysqli_fetch_array($result)){
           if($flag==0){ ?>
            <div class="top-image">
                <?php include("facilities_slider.php"); ?>
                <!-- <img src="admin/img/uploaded_images/<?php echo $count['facility_image']; ?>"/> -->
		    </div><!-- end of div top-image-->
                <p class="description"><?php echo $count['description']; ?></p>
            <?php $flag=1;
            }
            else{ ?>
                <div class="facilities_content">
                    <img src="admin/img/uploaded_images/<?php echo $count['facility_image']; ?>" height="250" width="600"/>
			        <h1><?php echo $count['facility_name']; ?></h1>
                    <p><?php echo $count['description']; ?></p>
			        <a href="#">Find More</a>
                </div>
            <?php }
        }
    ?>
	<?php include("footer1.php");?>
</div><!--end of div ccontainer-->