


==> Before login 

    get the session details and store these session_id into the new variable  ($old_session)

    $old_session = get the cart details from table using this session id and update the details with user_id 


    like this 

        update cart_details set user_id = <user id> where session_id = $old_session




     select * from cart_details where (user_id = <user id> OR session_id = $session_id)



     after order please delete the cart_details records as according to user_id 



     user id => user table (id)
     
    

