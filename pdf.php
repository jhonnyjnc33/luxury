<?php
	include("includes/pdf/html2pdf.class.php");
	$content = '
							<style type="text/css">
								table{
									width: 100%;
								}
								.inline{
									display: inline-block;
								}
							</style>
							<page>
								<page_header>
								<table>
									<tr>
										<td style="width: 50%; text-align: left">
											<h3 class="inline">Hoteles Solaris</h3> | Jugos RTD
										</td>
										<td style="width: 50%; text-align: right">
											<img src="images/logo-delli.png" width="150" />
										</td>
									</tr>
									
								</table> 
								</page_header>
							</page>
							';
							$html2pdf = new HTML2PDF('L','A4','fr');
						    $html2pdf->WriteHTML($content);
						    $html2pdf->Output('pdf/ejemplo_1.pdf', 'F');
?>
