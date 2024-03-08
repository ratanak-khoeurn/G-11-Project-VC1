<link rel="stylesheet" href="../../../vendor/css/manager_page.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
    
    <div class="container">
        <nav>
            <div class="left">
                <a href=""><img src="../../assets/images/logo_web.png" alt="" style="width: 70px;height:70px;"></a>
                <h2>Restaurant</h2>
            </div>
            <div class="right">

            </div>
        </nav>
        <main>
            <div class="main_left">
                <form action="#" style="height:100%">
                    <h1>Add New Product</h1>
                    <div class="group_label">
                        <label for="">Name:</label>
                        <input type="text"  id="name" name="name" placeholder="Enter restaurant's name"/>
                    </div>
                    <div class="group_label">
                        <label for="">Price</label>
                        <input type="number"  id="price" name="price" placeholder="Enter the price"/>
                    </div>
                    <div class="group_label">
                        <label for="">Category:</label>
                        <input type="text"  id="cate" name="cate" placeholder="Enter product's category"/>
                    </div>
                    <div class="group_label">
                        <label for="">Discount:</label>
                        <input type="number"  id="discount" name="discount" placeholder="Enter product's discount"/>
                    </div>
                    <div class="group_label">
                        <label for="">Picture:</label>
                        <input type="file"  id="pic" name="pic" placeholder="choose your image product"/>
                    </div>
                </form>
            </div>
            <div class="main_right">
                <div class="top">
                    <h1 style="text-decoration: underline;">List of the Product</h1 style="text-decoration: underline;">
                    <input type="text"  id="search" placeholder="Search..."/>
                </div>
                <hr style="width: 100%;">
                <div class = MG-4>
                <div></div>
            </div>
            </div>
        </main>
    </div>
</body>