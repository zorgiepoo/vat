<?php

require_once 'lib/init.php';
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VAT - Variant Annotation Tool</title>
        <meta name="description" content="Variant annotation tool cloud service">
        <meta name="author" content="Gerstein Lab">
        
        <!-- HTML5 shim for IE 6-8 support -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- Styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
            }
        </style>
        
        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
        <script>!window.jQuery && document.write('<script src="js/jquery-1.4.4.min.js"><\/script>')</script>
        <script src="js/bootstrap-dropdown.js"></script>
 		<script>

 		</script>
    </head>
    <body>
        <div class="topbar">
            <div class="fill">
                <div class="container-fluid">
                    <a class="brand" href="index.php">VAT</a>
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <li class="dropdown active" data-dropdown="dropdown">
                        	<a href="#" class="dropdown-toggle">Documentation</a>
                        	<ul class="dropdown-menu">
                        		<li><a href="installation.php">Installing</a></li>
                        		<li><a href="formats.php">Data formats</a></li>
                        		<li><a href="programs.php">List of programs</a></li>
                        		<li><a href="workflow.php">Example workflow</a></li>
                        		<li class="divider"></li>
                        		<li><a href="documentation.php">All documentation</a></li>
                        	</ul>
                        </li>
                        <li><a href="download.php">Download</a></li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="container-fluid">
        	<div class="sidebar">
        		<div class="well">
        			<h2>Contents</h2>
        			<ol>
        				<li>Data formats
        					<ol>
        						<li><a href="#vcf-format">VCF</a></li>
        						<li><a href="#interval-format">Interval</a></li>
        					</ol>
        				</li>
        			</ol>
        		</div><!-- /well -->
        	</div><!-- /sidebar -->
        
        	<div class="content">
	        	<div class="page-header">
	                <h1>Data Formats</h1>
	            </div>
	            
	        	<section id="vcf-format">
	        		<div class="page-header">
	        			<h2>VCF</h2>
	        		</div>

     				<p>
     					The Variant Call Format (VCF) is a tab-delimited text file format to represent a number of different genetic variants including single nucleotide polymorphisms (SNPs), small insertions and deletions (indels), and structural variants (SVs). This format was developed as part of the <a href="http://www.1000genomes.org/" target="external">1000 Genomes Project</a>. A detailed summary of this file format can be found <a href="http://www.1000genomes.org/wiki/Analysis/Variant%20Call%20Format/vcf-variant-call-format-version-40" target="external">here</a>. The annotation information is captured as part of the <strong>INFO field</strong> using the <strong>VA (Variant Annotation) tag</strong>. The string with the variant information has the following format:
     				</p>
     				<pre>AlleleNumber:GeneName:GeneId:Strand:Type:FractionOfTranscriptsAffected:{List of transcripts}</pre>
     				<p>
     					All annotated variant use the above format to capture information about the gene. The format describing the list of affected transcripts depends on the variant class (SNP, indel, or SV) and the variant type as shown in the table below:
     				</p>
     				<table>
     					<thead>
     						<tr>
      						<th>Variant</th>
      						<th>Type<sup>1</sup></th>
      						<th>Transcript name</th>
      						<th>Transcirpt ID</th>
      						<th>Transcript length</th>
      						<th>Relative position of variant<sup>2</sup></th>
      						<th>Relative position of amino acid</th>
      						<th>Amino acid substitution</th>
      						<th>Transcript overlap</th>
     						</tr>
     					</thead>
     					<tbody>
     						<tr>
      						<th rowspan="5">SNP</th>
      						<td>synonymous</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- SNP -->
      						<td>nonsynonymous</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- SNP -->
      						<td>prematureStop</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- SNP -->
      						<td>removedStop</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- SNP -->
      						<td>spliceOverlap</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					
      					<tr>
      						<th rowspan="7">Indel</th>
      						<td>insertionFS</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- Indel -->
      						<td>insertionNFS</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- Indel -->
      						<td>deletionFS</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- Indel -->
      						<td>deletionNFS</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- Indel -->
      						<td>startOverlap</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      						<td>No</td>
      						<td>No</td>
      						<td>No</td>
      					</tr>
      					<tr>
      						<!-- Indel -->
      						<td>endOverlap</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>Yes</td>
      						<td>No</td>
      						<td>No</td>
      						<td>No</td>
      						<td>No</td>
      					</tr>
      					<tr>
    						<!-- Indel -->
       						<td>spliceOverlap</td>
       						<td>Yes</td>
       						<td>Yes</td>
       						<td>Yes</td>
       						<td>No</td>
       						<td>No</td>
       						<td>No</td>
       						<td>No</td>
       					</tr>
       					<tr>
       						<th>SV</th>
       						<td>svOverlap</td>
       						<td>Yes</td>
       						<td>Yes</td>
       						<td>Yes</td>
       						<td>No</td>
       						<td>No</td>
       						<td>No</td>
       						<td>Yes</td>
       					</tr>
      					</tbody>
      					<tfoot>
      						<tr>
      							<td colspan="9">
      								<h5>Notes:</h5>
      								<ol>
      									<li>FS &lt;=&gt; frameshift, NFS &lt;=&gt; non-frameshift</li>
      									<li>Relative position respect to the transcript start site</li>
      								</ol>
      							</td>
      						</tr>
      					</tfoot>
      				</table>
      				<p>
      					The allele number refers to the numbering of the alleles. By definition, the reference allele has zero as the allele number, whereas the alternate alleles are numbered starting at one (some variants have more than one alternate alleles). The type refers to the type of variant. For SNPs, the types can take on the following values (generated by snpMapper): synonymous, nonsynonymous, prematureStop, removedStop, and spliceOverlap. For indels (generated by indelMapper), the types can take on the following values: spliceOverlap, startOverlap, endOverlap, insertionFS, insertionNFS, deletionFS, deletionNFS, where FS denotes 'frameshift' and NFS indicates 'non-frameshift'. The term spliceOverlap (for both SNPs and indels) refers to a genetic variant that overlaps with a splice site (either two nucleotides downstream of an exon or two nucleotides upstream of an exon).
      				</p>
      				
      				<h4>Example 1</h4>
      				<p>A SNP is introducing a premature stop codon. This variant affects one out of five transcripts for this gene.</p>
      				<pre>chr1	23112837	.	A	T	.	PASS	AA=A;AC=7;AN=118;DP=168;SF=2;VA=1:EPHB2:ENSG00000133216:+:prematureStop:1/5:EPHB2-001:ENST00000400191:3165_3055_1019_K-&gt;*</pre>
       			
	       			<h4>Example 2</h4>
	       			<p>A SNP leads to a non-synonymous substitution. This variant affects two out of four transcripts for this gene.</p>
	       			<pre>chr1	1110357	.	G	A	.	PASS	AA=G;AC=3;AN=118;DP=203;SF=2;VA=1:TTLL10:ENSG00000162571:+:nonsynonymous:2/4:TTLL10-001:ENST00000379288:1212_1187_396_R-&gt;H:TTLL10-202:ENST00000400931:1212_1187_396_R-&gt;H</pre>
	       			
	       			<h4>Example 3</h4>
	       			<p>A SNP causing a non-synonymous substitution in one transcript and a splice overlap in another transcript of the same gene.</p>
	       			<pre>chr9	35819390	rs2381409	C	T	.	PASS	AA=N;AC=157;AN=240;DP=49;SF=0,1;VA=1:TMEM8B:ENSG00000137103:+:nonsynonymous:1/7:TMEM8B-202:ENST00000360192:2109_166_56_P-&gt;S,1:TMEM8B:ENSG00000137103:+:spliceOverlap:1/7:TMEM8B-001:ENST00000450762:2106</pre>
	       			
	       			<h4>Example 4</h4>
	       			<p>An indel with two alternate alleles. Each alternate allele leads to a non-frameshift deletion.</p>
	       			<pre>chr7	140118541	.	TACAACAACA	T,TACA	.	PASS	HP=1;VA=1:AC006344.1:ENSG00000236914:+:deletionNFS:1/1:AC006344.1-201:ENST00000434223:66_23_8_LQQQ-&gt;L,2:AC006344.1:ENSG00000236914:+:deletionNFS:1/1:AC006344.1-201:ENST00000434223:66_23_8_LQQ-&gt;L</pre>
	       			
	       			<p>
	       				Notice that multiple annotation entries are comma-separated. Multiple annotation entries arise when a variant causes different types of effects on different transcripts (Example 3) or if there are multiple alternate alleles (Example 4).
	       			</p>
	       			<p>
	       				VAT also enables the grouping of samples. For examples, samples can be assigned to different sub-populations or they can be designated as cases or controls. This is done by modifying the header line using vcfModifyHeader. Specifically, the sample is prefixed by group identifier using the ':' character as a delimiter.
	       			</p>
	       		</section>
	       		
	       		<section id="interval-format">
	       			<div class="page-header">
	        			<h2>Interval</h2>
	        		</div>
	        		
	       			<p>The Interval format consists of eight tab-delimited columns and is used to represent genomic intervals such as genes. This format is closely associated with the <a href="http://homes.gersteinlab.org/people/lh372/SOFT/bios/intervalFind_8c.html" target="external">intervalFind module</a>, which is part of libBIOS. This module efficiently finds intervals that overlap with a query interval. The underlying algorithm is based on containment sublists: Alekseyenko, A.V., Lee, C.J. "Nested Containment List (NCList): A new algorithm for accelerating interval query of genome alignment and interval databases" <em>Bioinformatics</em> 2007;23:1386-1393 <a href="http://bioinformatics.oxfordjournals.org/cgi/content/abstract/23/11/1386" target="external">[1]</a></p>
	       			<ol>
	       				<li>Name of the interval</li>
	       				<li>Chromosome</li>
	       				<li>Strand</li>
	       				<li>Interval start (with respect to the "+")</li>
	       				<li>Interval end (with respect to the "+")</li>
	       				<li>Number of sub-intervals</li>
	       				<li>Sub-interval starts (with respect to the "+", comma-delimited)</li>
	       				<li>Sub-interval end (with respect to the "+", comma-delimited)</li>
	       			</ol>
	       			<p>
	       				<strong>Note:</strong>  For the purpose of VAT, the name field in the Interval file must contain four pieces of information delimited by the '|' symbol (geneId|transcriptId|geneName|transcriptName). Using the gencode2interval program ensures proper formatting.
	       			</p>
	       			<p>Example file:</p>
	        			
<pre>ENSG00000008513|ENST00000319914|ST3GAL1|ST3GAL1-201	chr8	-	134472009	134488267	6	134472009,134474117,134475656,134477020,134478136,134487961	134472180,134474237,134475702,134477200,134478333,134488267
ENSG00000008513|ENST00000395320|ST3GAL1|ST3GAL1-202	chr8	-	134472009	134488267	6	134472009,134474117,134475656,134477020,134478136,134487961	134472180,134474237,134475702,134477200,134478333,134488267
ENSG00000008513|ENST00000399640|ST3GAL1|ST3GAL1-203	chr8	-	134472009	134488267	6	134472009,134474117,134475656,134477020,134478136,134487961	134472180,134474237,134475702,134477200,134478333,134488267
ENSG00000008516|ENST00000325800|MMP25|MMP25-201	chr16	+	3097544	3105947	4	3097544,3100009,3100254,3105830	3097548,3100145,3100546,3105947
ENSG00000008516|ENST00000336577|MMP25|MMP25-202	chr16	+	3096918	3109096	10	3096918,3097415,3100009,3100254,3107033,3107310,3107531,3108181,3108412,3108827	3097017,3097548,3100145,3100547,3107210,3107395,3107614,3108334,3108670,3109096</pre>
	        			
        		</section>
        	</div><!-- /content -->
        	
        	<footer>
                <p>&copy; Gerstein Lab 2011</p>
            </footer>
        </div><!-- /container-fluid -->
    </body>
</html>