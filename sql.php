$sql = "SELECT  penjualan.penjualanID , penjualan.tanggalPenjualan, penjualan.totalHarga, pelanggan.namaPelanggan, users.idUser FROM penjualan 
                  INNER JOIN pelanggan ON pelanggan.pelangganID = penjualan.pelangganID
                  INNER JOIN users ON users.idUser = penjualan.idUser
                  ";
