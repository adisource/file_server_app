<?php 
	
	//Constants for database connection
	define('DB_HOST','localhost');
	define('DB_USER','u614985963_lades');
	define('DB_PASS','1sampai8');
	define('DB_NAME','u614985963_lades');

	//We will upload files to this folder
	//So one thing don't forget, also create a folder named uploads inside your project folder i.e. MyApi folder
	define('UPLOAD_PATH', 'upload/barang');
	
	//connecting to database 
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die('Unable to connect');
	

	//An array to display the response
	$response = array();

	//if the call is an api call 
	if(isset($_GET['apicall'])){
		
		//switching the api call 
		switch($_GET['apicall']){
			
			//if it is an upload call we will upload the image
			case 'uploadpic':
				
				//first confirming that we have the image and tags in the request parameter
				if(isset($_FILES['pic']['name']) && isset($_POST['nama'])){
					
					//uploading file and storing it to database as well 
					try{
						move_uploaded_file($_FILES['pic']['tmp_name'], UPLOAD_PATH . $_FILES['pic']['name']);
						$stmt = $conn->prepare("INSERT INTO barang (nama_barang, keterangan, harga, stok, status, gambar, slug, id_kategori, id_suplayer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
						$stmt->bind_param("ssiisssii", $_POST['nama'],$_POST['ket'],$_POST['harga'],$_POST['stok'],$_POST['status'],$_FILES['pic']['name'],$_POST['slug'],$_POST['id_kat'],$_POST['id_sup']);
						if($stmt->execute()){
							$response['error'] = false;
							$response['message'] = 'File uploaded successfully';
						}else{
							throw new Exception("Could not upload file");
						}
					}catch(Exception $e){
						$response['error'] = true;
						$response['message'] = 'Could not upload file';
					}
					
				}else{
					$response['error'] = true;
					$response['message'] = "Required params not available";
				}
			
			break;
			
			//in this call we will fetch all the images 
			case 'getpics':
		
				//getting server ip for building image url 
				$server_ip = gethostbyname(gethostname());
				
				//query to get images from database
				$stmt = $conn->prepare("SELECT nama_barang, keterangan, harga, stok, status, gambar, slug FROM barang");
				$stmt->execute();
				$stmt->bind_result($nama_barang, $keterangan, $harga, $stok, $status, $gambar, $slug);
				
				$images = array();

				//fetching all the images from database
				//and pushing it to array 
				while($stmt->fetch()){
					$temp = array();
					$temp['nama_barang'] = $nama_barang; 
					$temp['gambar'] = 'http://' . $server_ip . '/'. UPLOAD_PATH . $gambar; 
					$temp['keterangan'] = $keterangan; 
					
					array_push($images, $temp);
				}
				
				//pushing the array in response 
				$response['error'] = false;
				$response['gambar'] = $gambar; 
			break; 
			
			default: 
				$response['error'] = true;
				$response['message'] = 'Invalid api call';
		}
		
	}else{
		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();
	}
	
	//displaying the response in json 
	header('Content-Type: application/json');
	echo json_encode($response);