<?php

    session_start();

    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled') {

            // echo 'YOu cancel the payment';
            header('Location: ../cart.php');

        } elseif($_GET['status'] == 'successful') {

            $txid = $_GET['transaction_id'];

            $tx_ref = $_GET['tx_ref'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK_TEST-440e6c29d558dd63e088a8ffcd4444ae-X"
                ),
              ));
              
              $response = curl_exec($curl);

            //   echo($response);
              
              curl_close($curl);
              
              $res = json_decode($response);

            //   echo($response);

              
              if($res->status == "success")
              {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;

                if($amountPaid >= $amountToPay)
                {
                    // echo 'Payment successful';

                    //* Continue to give item to the user

                    include('../includes/db.php');
                    include('../functions/functions.php');
                    
                    if (isset($_GET['c_id'])) {

                        $customer_id = $_GET['c_id'];		
                    }
                
                    $ip_add = getRealIpUser();

                    $status = "Complete";                    
                
                    // $invoice_no = mt_rand();
                    $invoice_no = $txid;
                    $transactionRef = $tx_ref;
                
                    $select_cart = "select * from cart where ip_add='$ip_add'";
                
                    $run_cart = mysqli_query($con, $select_cart);
                
                    while ($row_cart = mysqli_fetch_array($run_cart)) {
                
                        $pro_id = $row_cart['p_id'];

                        $paymentMode = "Card Payment";
                
                        $pro_qty = $row_cart['qty'];
                            
                        $sub_total = $row_cart['p_price'] * $pro_qty;
                
                        $insert_customer_order = "insert into customer_orders (customer_id, due_amount, invoice_no, transactionRef, qty, order_date, order_status ) values ('$customer_id', '$sub_total', '$invoice_no', '$transactionRef', '$pro_qty', NOW(), '$status')";
                
                        $run_customer_order = mysqli_query($con, $insert_customer_order);

                        $insert_payment = "insert into payments (invoice_no, transactionRef, amount, payment_mode) values ('$invoice_no', '$transactionRef', '$sub_total', '$paymentMode')";

                        $run_payment_order = mysqli_query($con, $insert_payment);

                        $insert_pending_payment = "insert into pending_orders (customer_id, invoice_number, product_id, qty, order_status) values ('$customer_id', '$invoice_no', '$pro_id','$pro_qty', '$order_status')";

                        $run_pending_payment = mysqli_query($con, $insert_pending_payment);
                
                        $delete_cart = "delete from cart where ip_add='$ip_add'";
                
                        $run_delete = mysqli_query($con, $delete_cart);
                
                        echo "<script>alert('Your order has been submitted, Thanks')</script>";
                
                        echo "<script>window.open('../customer/my_account.php?my_orders', '_self')</script>";                
                
                    }
                    
                }
                else
                {
                    echo 'Fraud transaction detected';
                }
              }
              else
              {
                  echo 'Cannot process payment';
              }
        }
    }
?>