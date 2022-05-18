
<?php
    session_start();
?>
<div class="modal-container" id="billing_address" style="display: none;padding: 50px 25% 100%;"> 
    <div class="modal-content" style="display: inline-table;height: 100%;">
        <span>
            <div id="address-list" class="fade-appear fade-appear-active">
                <h2 style="text-align: center;">Editar dirección de facturación</h2>
                <?php
                    include 'php/conexion.php';
                    $id_user = $_SESSION['id'];
                    $query    = "SELECT * FROM billing_address WHERE id_user='$id_user'";
                    $result = mysqli_query($conexion,$query);
                    
                    if(mysqli_num_rows($result)>0)
                    {
                        while ($extraido= mysqli_fetch_array($result))
                        {
                            //id	id_user	country	full_name	company	street_address1	street_address2	city	zip_code	statedir
                            $id             = $extraido['id'];
                            $id_user        = $extraido['id_user'];
                            $country        = $extraido['country'];
                            $full_name      = $extraido['full_name'];
                            $company        = $extraido['company'];
                            $street_address1= $extraido['street_address1'];
                            $street_address2= $extraido['street_address2'];
                            $city           = $extraido['city'];
                            $statedir       = $extraido['statedir'];
                            $zip_code       = $extraido['zip_code'];
                            $default_address= $extraido['default_address'];
                            ?>
                                <form action="upload.php?price=57" class="product-options" method="get" id="form_id"
                                 style="display: table;margin-bottom: 10px;height: 110px;border: 1px solid rgba(0,0,0,.15);">
                                    <div style="float: left;width: 85%;">
                                        <label style="width: 90%;padding-left: 20px;padding-top: 6px;">
                                        <span class="push-left font-medium" style="width: 100%;"><?php echo $full_name;?></span>
                                        <span class="push-left price"><?php echo $street_address1." ".$street_address2;?></span>
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $country;?>"         id="ups_ul_country_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $full_name;?>"       id="ups_ul_name_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $company;?>"         id="ups_ul_company_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $street_address1;?>" id="ups_ul_add1_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $street_address2;?>" id="ups_ul_add2_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $city;?>"            id="ups_ul_city_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $zip_code;?>"        id="ups_ul_postal_bill<?php echo $id;?>">
                                        <input type="text" style="visibility:hidden;display:none;" value="<?php echo $statedir;?>"        id="ups_ul_state_bill<?php echo $id;?>">
                                        
                                        <?php
                                            if($country=="US")
                                            {
                                            
                                                $country = "United States";
                                            }
                                            if($country=="MX")
                                            {
                                                $country = "Mexico";
                                            }
                                        ?>
                                        <span class="push-left price" style="width: 100%;"><?php echo $city.", ".$statedir." ".$zip_code.", ".$country;?></span>
                                        
                                        </label>
                                    </div>
                                    <div style="display: table-cell;vertical-align: middle;width: 40%;">
                                        <div class="buttons-2 buttons" style="display: inline-block;">
                                            <?php
                                            if($default_address==1)
                                                $d_bill = $default_address;
                                            if($default_address==1)
                                            {
                                                ?>
                                                    <span class="push-left price" style="width: 130px;">Default</span>
                                                <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <a href="../account/make_default_billing.php?id_dir=<?php echo $id;?>" class="button secondary  tiny  pr-4 " type="button" 
                                                    style="width: 132px;text-align: center;display: inline-flex;">
                                                    Hacer default
                                                </a>
                                            <?php
                                            }
                                            ?>
                                            <!--<a href="account/edit_address.php?id_dir=<?php //echo $id;?>" class="button primary pr-4" type="button" 
                                                style="width: 60px;text-align: center;margin: 0px 0px -5px 0px;padding-left: 15px;">
                                                Edit
                                            </a>-->
                                            <button class="button tiny  pr-4 primary" type="button" onclick="Edit_billing_Address(<?php echo $id;?>)">Editar</button>
                                                <?php
                                                    if(isset($_SESSION['NAB']))
                                                    {
                                                        unset($_SESSION['NAB']);
                                                        ?>
                                                            <div id='errorNA' class='tooltiperror error'    >
                                                                <span class='text'>No puedes eliminar la dirección ya que hay una orden que la esta usando</span>
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                            <a href="../account/delete_billing_address.php?id=<?php echo $id;?>"><i style="color:red;" class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                </form>
                            <?php
                        }
                    }
                    mysqli_close($conexion);
                ?>
                <span id="shipping-address-book-app" style="width: 100%;display: inline-block;text-align: center;">&nbsp;
                    <button class="button link edit" type="button" onclick="New_billing_Address()">Agregar una dirección de facturación</button>
                </span>
            </div>
        </span>
        <button class="modal-close-x" onclick="Close_Billing_Address()" type="button">×</button>
    </div>
</div>