module blockO (
	input logic [8:0] x,
	input logic [8:0] o,
	output logic [8:0] out
);

always_comb begin
	out = 9'b000_000_000;
	if (((x[1] & x[2]) | (x[3] & x[6]) | (x[4] & x[8])) & ~o[0]) begin
			out[0] = 1;
		end 
		else begin
			out[0] = 0;
			if (((x[0] & x[2]) | (x[4] & x[7])) & ~o[1] & ~out[0]) begin
				out[1] = 1;
			end else begin
				out[1] = 0;
	    		if (((x[0] & x[1]) | (x[5] & x[8]) | (x[4] & x[6])) & ~o[2] & ~out[1] & ~out[0]) begin
	    			out[2] = 1;
	    		end else begin
	    			out[2] = 0;
		    		if (((x[4] & x[5]) | (x[0] & x[6])) & ~o[3] & ~out[2] & ~out[1] & ~out[0]) begin
		    			out[3] = 1;
		    		end else begin
		    			out[3] = 0;
			    		if (((x[3] & x[5]) | (x[1] & x[7]) | (x[0] & x[8]) | (x[2] & x[6])) & ~o[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
			    			out[4] = 1;
			    		end else begin
			    			out[4] = 0;
				    		if (((x[3] & x[4]) | (x[2] & x[8])) & ~o[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
				    			out[5] = 1;
				    		end else begin
				    			out[5] = 0;
					    		if (((x[7] & x[8]) | (x[0] & x[3]) | (x[2] & x[4])) & ~o[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
					    			out[6] = 1;
					    		end else begin
					    			out[6] = 0;
						    		if (((x[6] & x[8]) | (x[1] & x[4])) & ~o[7] & ~out[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
						    			out[7] = 1;
						    		end else begin
						    			out[7] = 0;
							    		if (((x[6] & x[7]) | (x[2] & x[5]) | (x[0] & x[4])) & ~o[8] & ~out[7] & ~out[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
							    			out[8] = 1;
							    		end else begin
								    		out[8] = 0; 
								    	end 
							    	end 
						    	end
					    	end
				    	end
			    	end
		    	end
	    	end
		end
	end
//end

endmodule : blockO