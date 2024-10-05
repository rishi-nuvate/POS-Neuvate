<section id="basic-vertical-layouts" style="overflow: auto; display: block">
    <div class="match-height">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="tab-pane active" aria-labelledby="account-tab"
                         role="tabpanel">
                        <!-- users edit account form start -->


                        <div class="row" id="printSection">
                            <table style="height:auto ;width:322px;" cellspacing="0" cellpadding="0">

                                <tr>
                                    <?php
                                    $num = 1;
                                    foreach ($barcodegenerates as $orders) {
                                    for ($i = 0; $i < $orders->getQty(); $i++) {

                                        $formattedValue = date("F-Y", strtotime($orders->po->getPoDate()));
                                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                        //$encode = intval($orders->getId());
                                        $encode = $orders->po->getSkuName() . '-' . $orders->getSkuMasterId();
                                        $generator->getBarcode($encode, $generator::TYPE_CODE_128);
                                        ?>

                                    <td style="padding:5px 6px" height="322px">
                                        <p style="width:3.8cm !important; font-size: 12px;margin: 0;padding: 0;"
                                           align="center"><?= $orders->getSkuMasterId() ?></p>
                                        <p style="width:3.8cm !important; font-size: 12px;margin: 0;padding: 0;"
                                           align="center">Marketed by
                                            : <?= $orders->po->vendor_master->getBillName() ?></p>
                                        <p style="width:3.8cm !important; margin: 2px;padding: 1px;"
                                           align="center">
                                                <?php
                                                //echo $generator->getBarcode($encode, $generator::TYPE_CODE_C39E);
                                                echo '<img style="border-radius: 0px !important;width: 135px;height: 25px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($encode, $generator::TYPE_CODE_128)) . '" style="height:0.8cm; width:3.8cm;">';
                                                ?>
                                        </p>
                                        <b style="font-size: 12px; margin: 0;padding: 0;"><?= $orders->po->vendor_master->getBillName() ?>
                                            - <?= $orders->po->getSkuName() ?>-<?= $orders->getSkuMasterId() ?></b>
                                        <b style="font-size: 12px; width:  margin: 0;padding: 0;font-weight: bold">Maximum
                                            Retail Price</b>
                                        <img src="<?= baseUrl() . 'images/rupee-indian.png' ?>"
                                             height="12px"
                                             width="12px"><b><?= $orders->po->getPrice() ?>.00</b>
                                        <b style="font-size: 12px;margin: 0;padding: 0;font-weight: bold">Inclusive
                                            of all Taxes</b>
                                        <b style="font-size: 12px;margin: 0;padding: 0;">Manufactured
                                            by </b>: <p
                                            style="font-size: 9px;margin: 0;padding: 0;"><?= $orders->po->vendor_master->getBillName() ?></p>

                                        <p style="font-size: 10px;margin: 0;padding: 0; font-weight: bold"><?= $orders->po->vendor_master->getBillAddress() ?></p>
                                        <p style="font-size: 10px;margin: 0;padding: 0; font-weight: bold">In case of
                                            complaints contact Manager customer
                                            service <?= $orders->po->vendor_master->getShipName() ?></p>
                                        <!--<p style="font-size: 12px;margin: 0;padding: 0;"><?/*= $orders->po->vendor_master->getShipAddress() */?></p>
                                                            <p style="font-size: 12px;margin: 0;padding: 0;">Email
                                                                : <?/*= $orders->po->vendor_master->getShipEmailid() */?></p>-->
                                        <p style="font-size: 10px;margin: 0;padding: 0;font-weight: bold">Tel no
                                            : <?= $orders->po->vendor_master->getShipMobileno() ?></p>

                                        <p style="font-size: 10px;margin: 0;padding: 0;font-weight: bold">Packed On
                                            : <?= $formattedValue ?></p>
                                        <p style="font-size: 10px;margin: 0;padding: 0;font-weight: bold">Net Qty :
                                            1N / Color
                                            : <?= $orders->po->getColor() ?></p>

                                        <p style="font-size: 10px;margin: 0;padding: 0;font-weight: bold">
                                            Product: <?= $orders->po->getProductType() ?></p>
                                        <p style="font-size: 10px;margin: 0;padding: 0;font-weight: bold">Color
                                            : <?= $orders->po->getColor() ?></p>
                                        <!--<p style="font-size: 10px;margin: 0;padding: 0;">
                                                                Size: <?/*= $orders->po->getSize() */?>cm</p>-->
                                    </td>
                                        <?

                                        if (($num % 2 == 0)) {
                                            echo '</tr><tr>';
                                        }
                                        $num++;
                                    }
                                    } ?>

                                </tr>
                            </table>
                        </div>
                        <!-- users edit account form ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
