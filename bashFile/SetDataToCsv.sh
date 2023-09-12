sudo killall snort
sudo tshark -r /var/www/html/a1083365/log/snort.log.* -e frame.number -e frame.time_relative -e _ws.col.Source -e _ws.col.Destination -e _ws.col.Protocol -e tcp.srcport -e tcp.dstport -e udp.srcport -e udp.dstport -e frame.len -T fields -E header=n -E separator=, -E quote=n -E occurrence=f > /var/www/html/a1083365/log/formatLog.csv
sudo rm -r /var/www/html/a1083365/log/snort.log.*
