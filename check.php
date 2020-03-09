<?php
$bl = array(
"bl.mailspike.net",
"b.barracudacentral.org",
"bl.spamcop.net",
"cbl.abuseat.org",
"dnsbl-1.uceprotect.net",
"dnsbl-2.uceprotect.net",
"dnsbl-3.uceprotect.net",
"dnsbl.ahbl.org",
"dnsbl.sorbs.net",
"dul.dnsbl.sorbs.net",
"sbl.spamhaus.org",
"short.rbl.jp",
"smtp.dnsbl.sorbs.net",
"socks.dnsbl.sorbs.net",
"spam.dnsbl.sorbs.net",
"web.dnsbl.sorbs.net"
);


$ip = $_POST['ip'];
$ip_array = explode('.', $ip);
$rev = array_reverse($ip_array);
$reverse = implode('.',$rev);

for($i = 0; $i <= 17; $i++){
   $com = $reverse.'.'.$bl[$i];
   $resp = @dns_get_record($com, DNS_A);
   if($resp[0][ip] == '127.0.0.1' || $resp[0][ip] == '127.0.0.2'){
        ?>
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Listado na <?php echo $bl[$i];?></h5>
                <a href="<?php echo $bl[$i]; ?>" class="btn btn-primary">Solicitar Delist</a>
            </div>
        </div>
        <?php
   }
}

?>
