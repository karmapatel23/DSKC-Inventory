 <?php  
 $connect = mysqli_connect("sql304.byethost7.com:3306", "b7_14337608", "Wesharethis1", "b7_14337608_login");

    if( isset( $_POST["export_excel"] ) ) {

        ob_clean();

        $sql = 'select * from Logs order by item';
        $result = mysqli_query( $connect, $sql );  
        if( mysqli_num_rows( $result ) > 0){


            $delimiter=',';
            $enclosure='"';

            /* rather than create an actual file, use an output buffer and write to that */
            $output=fopen('php://output','w+');

            /* add column headers */
            $headers=array( 'Unit Size', 'Quantity', 'Price_per_Unit', 'Time' );

            /* write the headers to the output stream */
            fputcsv( $output,$headers, $delimiter, $enclosure );

            /* loop through recordset and add that to the stream */
            while( $row = mysqli_fetch_array( $result ) ) {
                fputcsv( $output, $row, $delimiter, $enclosure );
            }

            fclose( $output );

            /* set the headers accordingly */
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename=download.csv');

            /* send the new content */
            ob_flush();

        }
    }

?>