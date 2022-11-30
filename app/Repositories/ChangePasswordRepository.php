<?php

namespace App\Repositories;

use App\Models\PasswordHash;

class ChangePasswordRepository implements ChangePasswordRepositoryInterface
{
    
    public function wp_hash_password( $password ) {
        global $wp_hasher;
    
        if ( empty( $wp_hasher ) ) {
            $wp_hasher = new PasswordHash( 8, true );
        }
    
        return $wp_hasher->HashPassword( trim( $password ) );
    }
    public function queryUpdatePassword($conn, $request){

        $wp_hash_pass = $this->wp_hash_password($request->new_pass);
        $query = $conn->prepare("UPDATE wp_users SET user_pass = ?  WHERE user_email = ?");
        $query->execute([$wp_hash_pass, $request->user_email]);

        return response()->json(['Password changed', 200]);
    }
}
