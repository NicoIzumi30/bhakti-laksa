<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_file')) {
    /**
     * Upload a file and return the result
     *
     * @param string $field_name The name of the input file field
     * @param string $upload_path The destination path for the file
     * @param array $config_overrides Optional configuration overrides
     * @return array The result of the upload process
     */
    function upload_file($field_name, $upload_path, $config_overrides = [])
    {
        $CI = &get_instance(); // Get CodeIgniter instance
        $CI->load->library('upload');

        // Default configuration
        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size'      => 2048,
            'file_name'     => time() . '_' . $_FILES[$field_name]['name'],
        ];

        // Override default configuration if needed
        $config = array_merge($config, $config_overrides);

        // Initialize upload library
        $CI->upload->initialize($config);

        if (!$CI->upload->do_upload($field_name)) {
            return [
                'status' => false,
                'error'  => $CI->upload->display_errors('', ''),
            ];
        }

        return [
            'status'     => true,
            'data'       => $CI->upload->data(),
        ];
    }
}
