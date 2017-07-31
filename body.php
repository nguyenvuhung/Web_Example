<?php
ob_start();
session_start();
require_once('config.php');

if(!isset($_REQUEST['p'])){	
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<div align="justify">		
	<?php
	$sql="select ndcd.macd AS typeid,ndcd.tencd AS typename,nd.* from chudenoidung AS ndcd,noidung AS nd WHERE nd.macd=ndcd.macd and nd.kichhoat=1 order by nd.mand DESC limit 0,10";		
	$result=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($result))
	{			
	?>			
	<tr><td>			
	<div class="typecontent" align="justify">
		<a href="index.php?p=chitiet&chude=<?php echo $row[macd]; ?>&mand=<?php echo $row[mand]; ?>"><? echo $row['tennd']; ?></a><br />
		<div class="ngay">Ngày đăng : <? echo $row['ngaydang']; ?> - Người gởi : <? echo $row['nguoigoi']; ?></div>
		<div class="bottomcontent1"><? echo $row['motangan']; ?></div>
	</div><br />	
	</td></tr>		
	<? } ?>	
</div>
</table>
<?php }else{
	$p=$_REQUEST['p'];
	if($p=='lienhe')
	{	
?>		
		<table border="0" cellpadding="0" cellspacing="0" width="499px">
		<tbody><tr>		
		<td class="td_lienhe">
			<strong>Nhóm Phát Triển Phần Mềm Sinh Viên Học Sinh
				<br>Student Softwares Development Group</strong><br><br>
			<strong>575/47/41 CMT8, P15, Q.10, TP.HCM</strong><br><br>			
			Fax: (08)39.705.944 <br>
			E-mail: <a href="mailto:student_soft@yahoo.com">student_soft@yahoo.com</a> <br>
			Website: <a href="phanmemsinhvien.net">phanmemsinhvien.net </a>
		</td>		
		 </tr>
		 <tr><td height="10px" colspan="2"></td></tr>
		 <tr>
		 <td colspan="2">
		 <form name="customers" onSubmit="return check1();" action="<?php echo $mosConfig_live_site; ?>view_contact_action.php" method="post" enctype="multipart/form-data">
			<table border="0" cellpadding="0" cellspacing="3" width="100%">
			  <tbody><tr>
				<td class="titlelienhe" nowrap="nowrap" valign="top">Tên của bạn </td>
				<td align="center" valign="top" width="10">:</td>
				<td width="100%"><label>
				  <input name="cus_name" type="text" class="combobox" size="35" />
				</label></td>
			  </tr>
			  <tr>
				<td class="titlelienhe">Tên công ty </td>
				<td align="center" valign="top" width="10">:</td>
				<td width="100%"><input name="cus_company" type="text" class="combobox" size="35" /></td>
			  </tr>
			  <tr>
				<td class="titlelienhe">Điện thoại </td>
				<td align="center" valign="top" width="10">:</td>
				<td width="100%"><input name="cus_phone" type="text" class="combobox" size="35" /></td>
			  </tr>
			  <tr>
				<td class="titlelienhe">Email</td>
				<td align="center" valign="top" width="10">:</td>
				<td width="100%"><input name="cus_email" type="text" class="combobox" size="35" /></td>
			  </tr>
			  <tr>
				<td class="titlelienhe">Nội Dung</td>
				<td align="center" valign="top" width="10">:</td>
				<td width="100%">
				<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
				<script type="text/javascript">
				bkLib.onDomLoaded(function() {
					//new nicEditor().panelInstance('area1');
					new nicEditor({fullPanel : true}).panelInstance('area1');
					new nicEditor({fullPanel : true}).panelInstance('area2');
					new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
					new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
				});
				</script>					
				<label>
					<textarea style="width: 350px; height: 200px;" id="area1" name="cus_des"></textarea>
				</label>
				</td>
			  </tr>			  
			  <tr>
				<td nowrap="nowrap">&nbsp;</td>
				<td align="center" valign="top" width="10">&nbsp;</td>
				<td width="100%"><label>
				  <input name="submit" type="submit" class="button" value="Gửi" />
				  <input name="reset" type="reset" class="button" value="Làm lại" />
				</label></td>
			  </tr>
			</tbody></table>
		   </form>		
			</td>
		</tr>
		</tbody></table>		
<?php }elseif($p=='noidung'){
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<?php
		$macd=$_REQUEST["chude"];			
		$sql="select ndcd.macd AS typeid,ndcd.tencd AS typename,nd.* from chudenoidung AS ndcd,noidung AS nd WHERE nd.macd=ndcd.macd and nd.kichhoat=1 AND nd.macd='$macd' order by nd.mand DESC ";		
		$perPage=5;				
		$page=1;			
			if (isset($_REQUEST["page"]))
					{$page=$_REQUEST["page"];}
				else
					{$page=1;}
				if($page<=0) 	$page=1;
				$query=mysql_query($sql);
				$rowCount=mysql_num_rows($query);
				$pageCount=floor($rowCount/$perPage);
				if ($rowCount % $perPage<>0)
				{
					$pageCount=$pageCount+1;
				}
				if($pageCount==0) $pageCount=1;
				if($page>$pageCount)
				{
					$page=$pageCount;
				}
				$start=($perPage * $page) - $perPage;
				$sql=$sql." limit $start, $perPage";
			$result=mysql_query($sql) or die(mysql_error());
			while($row=mysql_fetch_array($result))
			{			
			?>
			<tr><td>			
			<div class="typecontent" align="justify">
				<a href="index.php?p=chitiet&chude=<?php echo $row[macd]; ?>&mand=<?php echo $row[mand]; ?>"><? echo $row['tennd']; ?></a><br />
				<div class="ngay">Ngày đăng : <? echo $row['ngaydang']; ?> - Người gởi : <? echo $row['nguoigoi']; ?></div>
				<div class="bottomcontent1"><? echo $row['motangan']; ?></div>
			</div><br />	
			</td></tr>	
			<?			
			} 
		?>
		</table>
		<table border="0"  align="center" width="100%" cellspacing="0" cellpadding="0" style="border-Collapse: collapse" bordercolor="#FFFFFF">
			<tr> 
				<td align="right" style="padding-right:10px;">
					<table border="0" align="right" cellspacing="0" cellpadding="0">
						<tr>
							<td width="20">
								Trang						
							</td>
							<td width="5">&nbsp;
								
							</td>
							<td width="15">
								<?
									if($page>1)
									{
										$temp=$page-1;
										echo '<a href="'.$mosConfig_live_site.'index.php?p=noidung&chude='.$chudeid.'&page='.$temp.'"><img src="'.$mosConfig_live_site.'admin/images/previous.gif" border=0></a>';
									}
									else
									{
										echo '<img src="'.$mosConfig_live_site.'admin/images/previous_disable.gif" border=0>';
									}
								?>
							</td>
							<td>
								&nbsp;
                  	  <select onchange="window.location=this.options[this.selectedIndex].value;" style="vertical-align: middle;"> 																
            <?
                    $chudeid=$_REQUEST['chude'];
                        for($i=1;$i<=$pageCount;$i++)
                        {	
                            if ($i==$page)
                                echo "<option value=\"$i\" selected=\"selected\">".$i."</option>";
                            else
                                echo "<option value=\"".$mosConfig_live_site."index.php?p=noidung&chude=$chudeid&page=$i\">".$i."</option>";										
                        }
             ?>
          </select>&nbsp;								
							</td>
							<td width="15">
								<?								
									if($page<$pageCount)
									{
										$chudeid=$_REQUEST['chude'];
										$temp=$page+1;
										echo "<a href='".$mosConfig_live_site."index.php?p=noidung&chude=$chudeid&page=$temp.html'><img src='".$mosConfig_live_site."admin/images/next.gif' border=0 /></a>";
									}
									else
									{
										echo '<img src="'.$mosConfig_live_site.'admin/images/next_disable.gif" border=0>';
									}
								?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>			
<?php }elseif($p=='chitiet'){
		$mand=$_REQUEST['mand'];
		$macd=$_REQUEST['chude'];
		$sql="select * from noidung where kichhoat=1 AND mand='$mand' AND macd='$macd' ";
		$result=mysql_query($sql) or die(mysql_error());
		while($row=mysql_fetch_array($result))
		{
	?>				
			<div class="name_title">&nbsp;&nbsp;&nbsp;<? echo $row['tennd']; ?><br /></div>
			<div class="ngay">Ngày đăng : <? echo $row['ngaydang']; ?> - Người gởi : <? echo $row['nguoigoi']; ?></div>
			<div class="typecontent"><div class="bottomcontent1" align="justify">			
				<?php echo $row['motangan']; ?><br />
				<?php echo $row['motachitiet']; ?>			
		<? } ?>	
			<br />
			<div align="right"><a href="javascript:history.go(-1);" class="trove">Trở lại</a></div>
		</div></div>
<?php }elseif($p=='chude'){
	if(isset($_REQUEST["act"]))
	{
		if(isset($_REQUEST["macd"]) and $_REQUEST["act"]=="delete")
		{
			$macd=$_REQUEST["macd"];
			$temp="delete from chude where macd=".$macd;
			mysql_query($temp)  or die(mysql_error());
			echo "<script language=javascript>window.location='".$mosConfig_live_site."index.php?p=chude'</script>";
		}			
	}
?>	
	<div class="nameright">Quản lý chủ đề</div>	
        <table border=0 cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="20" class="topMenu" height="40">
                <form method="post">
                <table border="0" cellpadding="0" style="border-collapse: collapse;font-size:12px;" id="table12" class="content">
                    <tr valign="middle">
                        <td width="20">&nbsp;</td>
                        <td width="150" nowrap=nowrap>
                            Chủ đề của nội dung
                        </td>
                        <td width="185">                           
                            <? 
                            function show_categories($chudecon="0", $insert_text="")
                            {				
                                $sql_news="select macd AS typeid, tencd AS typename from chudenoidung where chudecon=".$chudecon." ";
                                    $result_news=mysql_query($sql_news) or die(mysql_error());
                                    while($row_news=mysql_fetch_array($result_news))
                                    {
                                        echo("<option value='".$row_news["typeid"]."'>".$insert_text.$row_news["typename"]."</option>");
                                        
                                        show_categories($row_news["typeid"],$insert_text."-");
                                    }
                                    return true;
                            }
                            ?>
                            <select size="1" name="cat" style="width: 180px;">
                                <option value=0>T&#7845;t c&#7843;</option>
                                <? show_categories(); ?>
                            </select>
                        </td>
                        <td width="20">
                        	<input type="image" src="<?php echo $mosConfig_live_site; ?>hinhanh/search.gif" width="16" height="16">
                        </td>
                    </tr>
                </table>
                </form>
            </td>
            <td width="20" class="topMenu" height="40">&nbsp;</td>
            <td width="60" class="topMenu" height="40">
                <a href="<?php echo $mosConfig_live_site; ?>index.php?p=themmoichude"><div align="center">Thêm m&#7899;i</div></a></td>
            <td width="20" class="topMenu" height="40">&nbsp;</td>
            <td width="18" align="center">
            <a href="#" onClick="history.forward();return false;">
                <img src="<?php echo $mosConfig_live_site; ?>hinhanh/backward.gif" border="0" width="16" title="Backward">
            </a>
        </td>
        <td width="18" align="center">
            <a href="#" onClick="window.location.reload();return false;">
                <img src="<?php echo $mosConfig_live_site; ?>hinhanh/refresh.gif" border="0" width="16" title="Refresh">
            </a>
        </td>
        <td width="18" align="center">
            <a href="#" onClick="history.back();return false;">
                <img src="<?php echo $mosConfig_live_site; ?>hinhanh/forward.gif" border="0" width="16" title="Forward">
            </a>
        </td>
        </tr>
    </table>    
    <fieldset style="border:0px; border-top: 1px solid #D0D0D0" >
        <legend>D&#7919; li&#7879;u</legend>
        <br>        
	    <table border="1"  align="center" width="100%" cellspacing="0" style="border-Collapse: collapse;font-size:12px;" bordercolor="#FFFFFF" id="table3">
        <tr>          
          <td bgcolor="#abbeef" height="20" width="10" align="center"><b>STT</b></td>
		  <td bgcolor="#abbeef" height="20" width="80" align="center"><b>Mã chủ đề</b></td>
          <td bgcolor="#abbeef" height="20" width="290" align="center"><b>Tên chủ đề</b></td>
		  <td bgcolor="#abbeef" height="20" align="center"><b>Mô tả</b></td>	  
          <td bgcolor="#abbeef" height="20" width="70" align="center"><b>Kích hoạt</b></td>
          <td bgcolor="#d6dff7" height="20" width="40"align="center"></td>
        </tr>
                <?
                    $perPage=20;
                    //----------------parameters
                    $cat=0;	
                    $filter=0;
                    $search="";
                    $page=1;
                   //----------------local variable
				if(!isset($_REQUEST['mode']))
				{					
					$strchudenoidung="SELECT chudenoidung.* from chudenoidung where chudenoidung.chudecon=0 order by macd DESC";					
					//----------------kiem tra xem user co filter theo category khong
					if (isset($_REQUEST["cat"]))
					{
						$cat=$_REQUEST["cat"];						
						if ($cat>=1)
						{
							$strchudenoidung="SELECT chudenoidung.* from chudenoidung where (chudenoidung.chudecon=$cat) order by macd DESC";
							
						}
					}
				}
				else
				{
					$mode=$_REQUEST['mode'];
					if($mode=='delete')
					{
						$strchudenoidung="SELECT chudenoidung.* from chudenoidung where chudenoidung.chudecon=0 order by macd DESC";			
					}
				}
				//---------------------Code phan trang
				if (isset($_REQUEST["page"]))
					{$page=$_REQUEST["page"];}
				else
					{$page=1;}
				if($page<=0) 	$page=1;
				$query=mysql_query($strchudenoidung);
				$rowCount=mysql_num_rows($query);
				$pageCount=floor($rowCount/$perPage);
				if ($rowCount % $perPage<>0)
				{
					$pageCount=$pageCount+1;
				}
				if($pageCount==0) $pageCount=1;
				if($page>$pageCount)
				{
					$page=$pageCount;
				}
				$start=($perPage * $page) - $perPage;
				$strchudenoidung=$strchudenoidung." limit $start, $perPage";
				$result=mysql_query($strchudenoidung)  or die(mysql_error());
				$i=1;				
				
				while($row=mysql_fetch_array($result))
				{					
			?>
	  <tr <? if($i%2==0) echo 'bgcolor="#FFFFFF"'; ?>>
	  <td valign="top" width="50" align="center">&nbsp;<? echo $i+($perPage*($page-1));?></td>
      <td valign="top" width="50" align="center">&nbsp;<? echo $row['macd'];?></td>	  
	  <td valign="top" width="100" align="justify">&nbsp;<? echo $row['tencd'];?></td>
	  <td valign="top" align="justify">&nbsp;<? echo $row['mota'];?></td>	  
	  <td width="100" align="center"><? echo $row['kichhoat'];?>&nbsp;</td>	   
      <td valign="top" width="80" align="center">
	  <?
	  if(!isset($_REQUEST['mode']))
	  {
	  ?>
		<a href="index.php?p=suachude&macd=<?  echo $row['macd']; ?>">
		  	<img src="hinhanh/edit.gif" border="0" title="S&#7917;a ch&#7919;a thông tin">
		</a>
		&nbsp;&nbsp;&nbsp;
		<a href="?act=delete&macd=<? echo $row['macd']; ?>">
		    <img border="0" src="hinhanh/delete.gif" width="16" title="Xóa">
		</a>		
	<? } ?>
	</td>
	<? $i++; } ?>
    </tr>		
    </table>
        <br>
        <table border="0"  align="center" width="100%" cellspacing="0" cellpadding="0" style="border-Collapse: collapse" bordercolor="#FFFFFF" id="table4">
            <tr> 
                <td align="right">
                    <table border="0"  align="right" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="20">
                                Trang						
                            </td>
                            <td width="5">&nbsp;
                                
                            </td>
                            <td width="15">
                                <?	
                                $cat = $_REQUEST['cat'];
                                
                                    if($page>1)
                                    {
                                        $temp=$page-1;
                                        echo '<a href="'.$mosConfig_live_site.'baiviet/trang'.$temp.'.html"><img src="'.$mosConfig_live_site.'admin/images/previous.gif" border=0></a>';
                                    }
                                    else
                                    {
                                        echo '<img src="'.$mosConfig_live_site.'hinhanh/previous_disable.gif" border=0>';
                                    }
                                ?>
                            </td>
                            <td>
                                &nbsp;
                              <select onchange="window.location=this.options[this.selectedIndex].value;" style="vertical-align: middle;"> 															
                                <?php							
									for($i=1;$i<=$pageCount;$i++)
									{	
										if ($i==$page)
											echo "<option value=\"$i\" selected=\"selected\">".$i."</option>";
										else
											echo "<option value=\"".$mosConfig_live_site."baiviet/trang$i.html\">".$i."</option>";                                                
									}
                                 ?>
                              </select>
                              &nbsp;
                            </td>
                            <td width="15">
                                <?
                                    if($page<$pageCount)
                                    {
                                        $temp=$page+1;
                                        echo '<a href="'.$mosConfig_live_site.'baiviet/trang'.$temp.'.html"><img src="'.$mosConfig_live_site.'hinhanh/next.gif" border=0></a>';
                                    }
                                    else
                                    {
                                        echo '<img src="'.$mosConfig_live_site.'hinhanh/next_disable.gif" border=0>';
                                    }
                                
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </fieldset>
<?php }elseif($p=='themmoichude'){ 
if(!isset($_REQUEST['mode']))
{
?>
<form action="chude.php" method="post">
<table width="100%" border="1" cellpadding="5" style="border-collapse: collapse" bordercolor="#FFFFFF" cellspacing="5">
    <tr> 
      <td width="99%" colspan="2">
		<b>THÊM M&#7898;I THÔNG TIN</b></td>
    </tr>
	<tr>
		<td>Ho&#7841;t &#273;&#7897;ng</td>
		<td>
			<input type="checkbox" name="kichhoat" value="1">
		</td>
	</tr>
	<tr> 
      <td width="21%" bgcolor="#F5F5F5">Thuộc chủ đề</td>
      <td width="78%" bgcolor="#F5F5F5"> 
	  <? 
		function show_categories($chudecon="0", $insert_text="")
		{				
			$sql_cat="select macd AS typeid, tencd AS typename from chudenoidung where chudecon=".$chudecon." ";
				$result_cat=mysql_query($sql_cat) or die(mysql_error());
				while($row_cat=mysql_fetch_array($result_cat))
				{
					echo("<option value='".$row_cat["typeid"]."'>".$insert_text.$row_cat["typename"]."</option>");
					show_categories($row_cat["typeid"],$insert_text."-");
				}
				return true;
		}
		?>
	  <select size="1" name="chudenoidung">
	  <option value="0">Cấp cha</option>	
		<?
			show_categories();
		?>				
		</select>
	  </td>
    </tr>	
    <tr> 
      <td width="21%">Tiêu đề tiếng việt </td>
      <td width="78%"> <input type="text" name="tencd" size="50"></td>
    </tr>
	<tr>
		<td class="titlelienhe">Mô tả</td>
		<td width="100%">
		<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
		<script type="text/javascript">
		bkLib.onDomLoaded(function() {
			//new nicEditor().panelInstance('area1');
			new nicEditor({fullPanel : true}).panelInstance('area1');
			new nicEditor({fullPanel : true}).panelInstance('area2');
			new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
			new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
		});
		</script>					
		<label>
			<textarea style="width: 350px; height: 200px;" id="area1" name="mota"></textarea>
		</label>
		</td>
	  </tr>
	<input type="hidden" name="mode" value="insert">
      <td>
		<input name="submit" type="submit" value="Thêm m&#7899;i" style="float: right"></td>
      <td><input name="reset" type="reset" value="H&#7911;y b&#7887;" onclick="javascript:history.go(-1);"></td>
    </tr>    
  </table>
</form>
<?php }}elseif($p=='suachude'){
	$macd=$_REQUEST['macd'];
	$query="select * from chudenoidung where macd='$macd'";
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result))
	{
?>
<form action="chude.php" method="post">
  <input type="hidden" name="macd" size="50" value="<? echo $row['macd'];?>">
  <table width="100%" border="1" cellpadding="5" style="border-collapse: collapse" bordercolor="#FFFFFF" cellspacing="5">
   <tr> 
      <td width="100%" colspan="2">
		<b>C&#7852;P NH&#7852;T THÔNG TIN</b></td>
    </tr>
    <tr>
		<td bgcolor="#F5F5F5">Ho&#7841;t &#273;&#7897;ng</td>
		<td bgcolor="#F5F5F5">
		<?
		if($row['kichhoat']==1)
		{
		?>
		<input type="checkbox" name="kichhoat" value="1" checked>
		<?
		}
		else
		{
		?>
		<input type="checkbox" name="kichhoat" value="1">
		<?
		}
		?>
		</td>
	</tr>
	<tr> 
      <td width="21%" bgcolor="#F5F5F5">Chủ đề nội dung </td>
      <td width="78%" bgcolor="#F5F5F5"> 
	  <? 
		function show_categories($chudecon="0", $insert_text="")
		{				
			$sql_cat="select macd AS typeid, tencd AS typename from chudenoidung where chudecon=".$chudecon." ";
				$result_cat=mysql_query($sql_cat) or die(mysql_error());
				while($row_cat=mysql_fetch_array($result_cat))
				{
					$macd=$_REQUEST['macd'];
					$query1="select * from chudenoidung where macd='$macd'";
					$result1=mysql_query($query1) or die(mysql_error());
					while($row1=mysql_fetch_array($result1))
					{
						if($row_cat['typeid']==$row1['chudeid'])
						{
							echo("<option value='".$row_cat["typeid"]."' selected=\"selected\">".$insert_text.$row_cat["typename"]."</option>");
						}else{
							echo("<option value='".$row_cat["typeid"]."'>".$insert_text.$row_cat["typename"]."</option>");
						}
					}
					show_categories($row_cat["typeid"],$insert_text."-");
				}
				return true;
		}
		?>
	  <select size="1" name="chudenoidung">		
	  <option value="0">Cấp cha</option>
		<?
			show_categories();
		?>				
	  </select>
	  </td>
    </tr>	
    <tr>     
      <td width="21%">Tiêu &#273;&#7873; </td>
      <td width="78%"> <input type="text" name="tencd" size="50" value="<? echo $row['tencd'];?>"></td>
    </tr>
	<tr>
		<td class="titlelienhe">Mô tả</td>
		<td width="100%">
		<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
		<script type="text/javascript">
		bkLib.onDomLoaded(function() {
			//new nicEditor().panelInstance('area1');
			new nicEditor({fullPanel : true}).panelInstance('area1');
			new nicEditor({fullPanel : true}).panelInstance('area2');
			new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
			new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
		});
		</script>					
		<label>
			<textarea style="width: 350px; height: 200px;" id="area1" name="mota"><? echo $row['mota'];?></textarea>
		</label>
		</td>
	  </tr>		
    <tr> 
	<input type="hidden" name="mode" value="update">
      <td bgcolor="#F5F5F5">
		<input name="submit" type="submit" value="C&#7853;p nh&#7853;t" style="float: right"></td>
      <td bgcolor="#F5F5F5"><input name="reset" type="submit" value="H&#7911;y b&#7887;" onclick="javascript:history.go(-1);"></td>
    </tr>    
  </table>
</form>
<?php } ?>
<?php }elseif($p=='baiviet'){	
		if(isset($_REQUEST["act"]))
		{
			if(isset($_REQUEST["mand"]) and $_REQUEST["act"]=="delete")
			{
				$mand=$_REQUEST["mand"];
				$temp="delete from noidung where mand=".$mand;
				mysql_query($temp)  or die(mysql_error());
				echo "<script language=javascript>window.location='".$mosConfig_live_site."index.php?p=baiviet'</script>";
			}			
		}
	?>    	
		<div class="nameright">Quản lý bài viết</div>		
        <table border=0 cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td width="20" class="topMenu" height="40">
                <form method="post">
                <table border="0" cellpadding="0" style="border-collapse: collapse;font-size:12px;" id="table12" class="content">
                    <tr valign="middle">
                        <td width="20">&nbsp;</td>
                        <td width="150" nowrap=nowrap>
                            Chủ đề của nội dung
                        </td>
                        <td width="185">                           
                            <? 
                            function show_categories($chudecon="0", $insert_text="")
                            {				
                                $sql_news="select macd AS typeid, tencd AS typename from chudenoidung where chudecon=".$chudecon." ";
                                    $result_news=mysql_query($sql_news) or die(mysql_error());
                                    while($row_news=mysql_fetch_array($result_news))
                                    {
                                        echo("<option value='".$row_news["typeid"]."'>".$insert_text.$row_news["typename"]."</option>");
                                        
                                        show_categories($row_news["typeid"],$insert_text."-");
                                    }
                                    return true;
                            }
                            ?>
                            <select size="1" name="cat" style="width: 180px;">
                                <option value=0>T&#7845;t c&#7843;</option>
                                <? show_categories(); ?>
                            </select>
                        </td>
                        <td width="20">
                                <input type="image" src="<?php echo $mosConfig_live_site; ?>hinhanh/search.gif" width="16" height="16">
                        </td>
                    </tr>
                </table>
                </form>
            </td>
            <td width="20" class="topMenu" height="40">&nbsp;</td>
            <td width="60" class="topMenu" height="40">
                <a href="<?php echo $mosConfig_live_site; ?>index.php?p=themmoibaiviet"><div align="center">Thêm m&#7899;i</div></a></td>
            <td width="20" class="topMenu" height="40">&nbsp;</td>
            <td width="18" align="center">
            <a href="#" onClick="history.forward();return false;">
                <img src="<?php echo $mosConfig_live_site; ?>hinhanh/backward.gif" border="0" width="16" title="Backward">
            </a>
        </td>
        <td width="18" align="center">
            <a href="#" onClick="window.location.reload();return false;">
                <img src="<?php echo $mosConfig_live_site; ?>hinhanh/refresh.gif" border="0" width="16" title="Refresh">
            </a>
        </td>
        <td width="18" align="center">
            <a href="#" onClick="history.back();return false;">
                <img src="<?php echo $mosConfig_live_site; ?>hinhanh/forward.gif" border="0" width="16" title="Forward">
            </a>
        </td>
        </tr>
    </table>    
    <fieldset style="border:0px; border-top: 1px solid #D0D0D0" >
        <legend>D&#7919; li&#7879;u</legend>
        <br>
         <form method="post" id="frm1">     
        <table border="1"  align="center" width="100%" cellspacing="0" style="border-Collapse: collapse;font-size:12px;" bordercolor="#FFFFFF" id="table3">
        <tr>      
          <td bgcolor="#abbeef" height="20" width="10"  align="center"><b>STT</b></td>
          <td bgcolor="#abbeef" height="20" width="290"  align="center"><b>Tên</b></td>	  
          <td bgcolor="#abbeef" height="20" width="50"  align="center"><b>Chủ đề</b></td>
          <td bgcolor="#abbeef" height="20" width="70"  align="center"><b>Kích hoạt</b></td>
          <td bgcolor="#d6dff7" height="20" width="40" align="center"></td>
        </tr>
                <?
                    $perPage=20;
                    //----------------parameters
                    $cat=0;	                    		
                    $filter=0;
                    $search="";
                    $page=1;
                    //----------------local variable
                    if(!isset($_REQUEST['mode']))
                    {
                        $strnoidung="SELECT noidung.*, chudenoidung.tencd AS typename from chudenoidung, noidung where chudenoidung.macd=noidung.macd order by noidung.mand DESC";
                        if (isset($_REQUEST["cat"]))
                        {
                            $cat=$_REQUEST["cat"];						
                            if ($cat>=1)
                            {
                                $strnoidung="SELECT noidung.* from noidung where (noidung.macd=$cat) order by noidung.mand DESC";
                                
                            }
                        }                        
                    }
                    else
                    {
                        $mode=$_REQUEST['mode'];
                        if($mode=='delete')
                        {
                            $strnoidung="SELECT noidung.* from noidung order by noidung.mand";	
                        }
                    }
                    //---------------------Code phan trang
                    if (isset($_REQUEST["page"]))
                        {$page=$_REQUEST["page"];}
                    else
                        {$page=1;}
                    if($page<=0) 	$page=1;
                    $query=mysql_query($strnoidung);
                    $rowCount=mysql_num_rows($query);
                    $pageCount=floor($rowCount/$perPage);
                    if ($rowCount % $perPage<>0)
                    {
                        $pageCount=$pageCount+1;
                    }
                    if($pageCount==0) $pageCount=1;
                    if($page>$pageCount)
                    {
                        $page=$pageCount;
                    }
                    $start=($perPage * $page) - $perPage;
                    $strnoidung=$strnoidung." limit $start, $perPage";
                    $result=mysql_query($strnoidung)  or die(mysql_error());
                    $i=1;
                    while($row=mysql_fetch_array($result))
                    {
                ?>
             <tr <? if($i%2==0) echo 'bgcolor="#FFFFFF"'; ?>>           	  
              <td width="10" align="center">&nbsp;<? echo $i+($perPage*($page-1));?></td>
              <td width="290" align="left">&nbsp;<? echo $row['tennd'];?></td>              
              <td width="100" align="center"><? echo $row['typename'];?>&nbsp;</td>
              <td width="70" align="center"><? echo $row['kichhoat'];?>&nbsp;</td>
              <td width="40" align="center">             
                <a href="<?php echo $mosConfig_live_site; ?>index.php?p=suabaiviet&mand=<? echo $row['mand']; ?>">
                    <img src="<?php echo $mosConfig_live_site; ?>hinhanh/edit.gif" border="0" title="S&#7917;a ch&#7919;a thông tin">
                </a>                
                <a href="<?php echo $mosConfig_live_site; ?>index.php?p=baiviet&act=delete&mand=<?php echo $row['mand']; ?>">
                    <img border="0" src="<?php echo $mosConfig_live_site; ?>hinhanh/delete.gif" width="16" title="Xóa">
                </a>            
              </td>
            </tr>
                <?
                    $i++;
                    }
                ?>
            </table>     
            </form>
        <br>
        <table border="0"  align="center" width="100%" cellspacing="0" cellpadding="0" style="border-Collapse: collapse" bordercolor="#FFFFFF" id="table4">
            <tr> 
                <td align="right">
                    <table border="0"  align="right" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="20">
                                Trang						
                            </td>
                            <td width="5">&nbsp;
                                
                            </td>
                            <td width="15">
                                <?	
                                $cat = $_REQUEST['cat'];
                                
                                    if($page>1)
                                    {
                                        $temp=$page-1;
                                        echo '<a href="'.$mosConfig_live_site.'baiviet/trang'.$temp.'.html"><img src="'.$mosConfig_live_site.'hinhanh/previous.gif" border=0></a>';
                                    }
                                    else
                                    {
                                        echo '<img src="'.$mosConfig_live_site.'hinhanh/previous_disable.gif" border=0>';
                                    }
                                ?>
                            </td>
                            <td>
                                &nbsp;
                              <select onchange="window.location=this.options[this.selectedIndex].value;" style="vertical-align: middle;"> 															
                                <?							
                                            for($i=1;$i<=$pageCount;$i++)
                                            {	
                                                if ($i==$page)
                                                    echo "<option value=\"$i\" selected=\"selected\">".$i."</option>";
                                                else
                                                    echo "<option value=\"".$mosConfig_live_site."baiviet/trang$i.html\">".$i."</option>";
                                                //if ($i!=$pageCount)
                                                    //echo "|";
                                            }
                                 ?>
                              </select>
                              &nbsp;
                            </td>
                            <td width="15">
                                <?
                                    if($page<$pageCount)
                                    {
                                        $temp=$page+1;
                                        echo '<a href="'.$mosConfig_live_site.'baiviet/trang'.$temp.'.html"><img src="'.$mosConfig_live_site.'hinhanh/next.gif" border=0></a>';
                                    }
                                    else
                                    {
                                        echo '<img src="'.$mosConfig_live_site.'hinhanh/next_disable.gif" border=0>';
                                    }
                                
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </fieldset>			
<?php } elseif($p=='themmoibaiviet') {	?>		
            <form action="baiviet.php" method="post" enctype="multipart/form-data">
              <table width="100%" border="1" cellpadding="5" style="border-collapse: collapse;font-size:12px;" bordercolor="#FFFFFF" cellspacing="5">
			  <tr>
					<td>Ho&#7841;t &#273;&#7897;ng</td>
					<td>
						<input type="checkbox" name="kichhoat" value="1" checked="checked">
					</td>
				</tr>
                <tr> 
                  <td width="21%" bgcolor="#F5F5F5">Thuộc chủ đề</td>
                  <td width="78%" bgcolor="#F5F5F5"> 
                  <? 
                    function show_categories($chudecon="0", $insert_text="")
                    {				
                        $sql_cat="select macd AS typeid, tencd AS typename from chudenoidung where chudecon=".$chudecon." ";
                            $result_cat=mysql_query($sql_cat) or die(mysql_error());
                            while($row_cat=mysql_fetch_array($result_cat))
                            {
                                echo("<option value='".$row_cat["typeid"]."'>".$insert_text.$row_cat["typename"]."</option>");
                                show_categories($row_cat["typeid"],$insert_text."-");
                            }
                            return true;
                    }
                    ?>
                  <select size="1" name="chudenoidung">		
                    <?
                        show_categories();
                    ?>				
                    </select>
                  </td>
                </tr>	
                <tr> 
                  <td width="21%">Tên nội dung</td>
                  <td width="78%"><input type="text" name="tennd" size="50"></td>
                </tr>	    
                <tr>
					<td class="titlelienhe">Mô tả ngắn</td>
					<td width="100%">
					<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
					<script type="text/javascript">
					bkLib.onDomLoaded(function() {
						//new nicEditor().panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area2');
						new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
						new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
					});
					</script>					
					<label>
						<textarea style="width: 350px; height: 200px;" id="area1" name="motangan"></textarea>
					</label>
					</td>
				  </tr>		
				<tr> 
                <tr>
					<td class="titlelienhe">Mô tả chi tiết</td>
					<td width="100%">
					<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
					<script type="text/javascript">
					bkLib.onDomLoaded(function() {
						//new nicEditor().panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area2');
						new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
						new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
					});
					</script>					
					<label>
						<textarea style="width: 350px; height: 200px;" id="area2" name="motachitiet"></textarea>
					</label>
					</td>
			    </tr>
				<tr>     
				  <td width="21%">Người gởi </td>
				  <td width="78%"> <input type="text" name="nguoigoi" size="50"></td>
				</tr>
                <tr>
                <input type="hidden" name="mode" value="insert">
                  <td>
                    <input name="submit" type="submit" value="Thêm m&#7899;i" style="float: right"></td>
                  <td><input name="reset" type="reset" value="H&#7911;y b&#7887;" onclick="javascript:history.go(-1);"></td>
                </tr>    
              </table>
            </form>
<?php } elseif($p=='suabaiviet'){		
		ob_start();	
		$mand=$_REQUEST['mand'];
		$query="select * from noidung where mand='$mand'";
		$result=mysql_query($query) or die(mysql_error());
		while($row=mysql_fetch_array($result)){
	?>	
            <form action="baiviet.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="mand" size="50" value="<? echo $row['mand'];?>">
              <table width="100%" border="1" cellpadding="5" style="border-collapse: collapse;font-size:12px;" bordercolor="#FFFFFF" cellspacing="5">
			  <tr>
				<td bgcolor="#F5F5F5">Ho&#7841;t &#273;&#7897;ng</td>
				<td bgcolor="#F5F5F5">
				<?
				if($row['kichhoat']==1)
				{
				?>
				<input type="checkbox" name="kichhoat" value="1" checked>
				<?
				}
				else
				{
				?>
				<input type="checkbox" name="kichhoat" value="1">
				<?
				}
				?>
				</td>
			</tr>
                <tr> 
                  <td width="21%" bgcolor="#F5F5F5">Chủ đề </td>
                  <td width="78%" bgcolor="#F5F5F5"> 
                  <? 	  
                    function show_categories($chudecon="0", $insert_text="")
                    {				
                        $sql_cat="select macd AS typeid, tencd AS typename from chudenoidung where chudecon=".$chudecon." ";
                            $result_cat=mysql_query($sql_cat) or die(mysql_error());
                            while($row_cat=mysql_fetch_array($result_cat))
                            {
                                $mand=$_REQUEST['mand'];
                                $query1="select * from noidung where mand='$mand'";
                                $result1=mysql_query($query1) or die(mysql_error());
                                while($row1=mysql_fetch_array($result1))
                                {
                                    if($row_cat['typeid']==$row1['macd'])
                                    {
                                        echo("<option value='".$row_cat["typeid"]."' selected=\"selected\">".$insert_text.$row_cat["typename"]."</option>");
                                    }else{
                                        echo("<option value='".$row_cat["typeid"]."'>".$insert_text.$row_cat["typename"]."</option>");
                                    }
                                }
                                show_categories($row_cat["typeid"],$insert_text."-");
                            }
                            return true;
                    }
                    ?>
                  <select size="1" name="chudenoidung">		
                    <?
                        show_categories();
                    ?>				
                  </select>	  
                  </td>
                </tr>	
                <tr> 
                  <td width="21%">Tên nội dung </td>
                  <td width="78%"><input type="text" name="tennd" size="50" value="<? echo $row['tennd'];?>"></td>
                </tr>                                
                <tr>
					<td class="titlelienhe">Mô tả ngắn</td>
					<td width="100%">
					<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
					<script type="text/javascript">
					bkLib.onDomLoaded(function() {
						//new nicEditor().panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area2');
						new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
						new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
					});
					</script>					
					<label>
						<textarea style="width: 350px; height: 200px;" id="area1" name="motangan"><? echo $row['motangan'];?></textarea>
					</label>
					</td>
				  </tr>		
				<tr> 
                <tr>
					<td class="titlelienhe">Mô tả chi tiết</td>
					<td width="100%">
					<script src="<?php echo $mosConfig_live_site; ?>nicEdit.js" type="text/javascript"></script>
					<script type="text/javascript">
					bkLib.onDomLoaded(function() {
						//new nicEditor().panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area1');
						new nicEditor({fullPanel : true}).panelInstance('area2');
						new nicEditor({iconsPath : '<?php echo $mosConfig_live_site; ?>nicEditorIcons.gif'}).panelInstance('area3');
						new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area4');
					});
					</script>					
					<label>
						<textarea style="width: 350px; height: 200px;" id="area2" name="motachitiet"><? echo $row['motachitiet'];?></textarea>
					</label>
					</td>
			    </tr>
				<tr>     
				  <td width="21%">Người gởi </td>
				  <td width="78%"><input type="text" name="nguoigoi" size="50" value="<? echo $row['nguoigoi'];?>"></td>
				</tr>	
                <tr> 
                <input type="hidden" name="mode" value="update">
                  <td bgcolor="#F5F5F5">
                    <input name="submit" type="submit" value="C&#7853;p nh&#7853;t" style="float: right"></td>
                  <td bgcolor="#F5F5F5"><input name="reset" type="button" value="H&#7911;y b&#7887;" onclick="javascript:history.go(-1);"></td>
                </tr>    
              </table>
            </form>
   		<?php } ?>
<?php }elseif($p=='timkiem'){ 
	$q=$_REQUEST['q'];	
	$sql="select * from noidung where tennd like '%".$q."%' or motangan like '%".$q."%' or motachitiet like '%".$q."%'";
	$perPage=20;				
	$page=1;
	if (isset($_REQUEST["page"]))
			{$page=$_REQUEST["page"];}
		else
			{$page=1;}
		if($page<=0) 	$page=1;
		$query=mysql_query($sql);
		$rowCount=mysql_num_rows($query);
		$pageCount=floor($rowCount/$perPage);
		if ($rowCount % $perPage<>0)
		{
			$pageCount=$pageCount+1;
		}
		if($pageCount==0) $pageCount=1;
		if($page>$pageCount)
		{
			$page=$pageCount;
		}
		$start=($perPage * $page) - $perPage;
		$sql=$sql." limit $start, $perPage";
		$result=mysql_query($sql) or die(mysql_error());
		$count=0;			
	$num_result=mysql_num_rows($result);
						
	if ($num_result){		
		echo "<strong>&nbsp;Kết quả tìm kiếm với từ khóa: {".$q."}</strong><br />";				
		for ($j=1;$j<=$num_result; $j++){
			$row=mysql_fetch_array($result);										
			echo "<br>&nbsp;-&nbsp;<a href='".$mosConfig_live_site."index.php?p=chitiet&chude=".stripslashes($row['chudeid'])."&mand=".stripslashes($row['id'])."'>".stripslashes($row['tennd'])."</a><br>";					
			echo $row['motangan'];
			echo "<br />";						
		}		
	}			
?>								
<table border="0" align="center" width="100%" cellspacing="0" cellpadding="0" style="border-Collapse: collapse" bordercolor="#FFFFFF">
<tr> 
	<td align="right" style="padding-right:10px;">
		<table border="0" width="100%" align="right" cellspacing="0" cellpadding="0">
			<tr>
				<td width="380px">&nbsp;</td>
				<td width="20">
					Trang						
				</td>
				<td width="5">&nbsp;
					
				</td>
				<td width="15">
					<?
						if($page>1)
						{
							$temp=$page-1;
							echo '<a href="'.$mosConfig_live_site.'index.php?p=timkiem&q='.$q.'&trang='.$temp.'"><img src="'.$mosConfig_live_site.'admin/images/previous.gif" border=0></a>';
						}
						else
						{
							echo '<img src="'.$mosConfig_live_site.'admin/images/previous_disable.gif" border=0>';
						}
					?>
				</td>
				<td>
				 &nbsp;
		 <select onchange="window.location=this.options[this.selectedIndex].value;" style="vertical-align: middle;"> 																
			<?								
						for($i=1;$i<=$pageCount;$i++)
						{	
							if ($i==$page)
								echo "<option value=\"$i\" selected=\"selected\">".$i."</option>";
							else
								echo "<option value=\"".$mosConfig_live_site."index.php?p=timkiem&q=$q&page=$i\">".$i."</option>";										
						}
			 ?>
		  </select>&nbsp;								
				</td>
				<td width="15">
					<?								
						if($page<$pageCount)
						{										
							$temp=$page+1;
							echo "<a href='".$mosConfig_live_site."index.php?p=timkiem&q=$q&trang=$temp'><img src='".$mosConfig_live_site."admin/images/next.gif' border=0 /></a>";
						}
						else
						{
							echo '<img src="'.$mosConfig_live_site.'admin/images/next_disable.gif" border=0>';
						}
					?>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>		
<br />
<a href="javascript:history.go(-1);" class="trove">Trở lại</a>
	<?
	}	
}
?>
