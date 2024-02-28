<?php
                                    $con=mysqli_connect("10.194.176.158","appdev","appdev123","crl");
                                    $con2=mysqli_connect("10.194.176.158","appdev","appdev123","syanida_helpdesk");

                                    $tanggal = date("Y-m-d",strtotime('-1 day'));
                                    $sql = "SELECT * FROM caring_cancel WHERE `input`='1' AND hasil_call='Masih Berminat Berlangganan' AND send_syanida_helpdesk is NULL";
                                    $sql_hasil = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($sql_hasil);

                                    
                                    if ($total > 0) {
                                        while ($row = mysqli_fetch_array($sql_hasil)) {
                                            $ndem = $row['ndem'];
                                            $nd = $row['nd'];
                                            $item = $row['item'];
                                            $xs6 = $row['xs6'];
                                            $ext_order_id = $row['scid'];
                                            $sqlInsert = "INSERT INTO dapros_test (ND_SPEEDY, ITEM, NDEM, XS6, EXTERNAL_ORDER_ID) VALUES 
                                                         ('$nd', '$item', '$ndem', '$xs6', '$ext_order_id')";
                                            
                                            mysqli_query($con2, $sqlInsert) or die(mysqli_error($con2));
                                            
                                            $id = $row['id'];
                                            $sqlUpdate = "UPDATE caring_cancel SET send_syanida_helpdesk='1' WHERE id='$id'";
                                            
                                            mysqli_query($con, $sqlUpdate) or die(mysqli_error($con));
                                            
                                            $no++;
                                        }
                                    }
?>