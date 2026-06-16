module winnerO (
	input logic [8:0] o,
	input logic [8:0] x,
	output logic [8:0] out
);

always_comb begin
	out = 9'b000_000_000;
	if (((o[1] & o[2]) | (o[3] & o[6]) | (o[4] & o[8])) & ~x[0]) begin
			out[0] = 1;
	end else begin
		out[0] = 0;
		if (((o[0] & o[2]) | (o[4] & o[7])) & ~x[1] & ~out[0]) begin
			out[1] = 1;
		end 
		else begin
			out[1] = 0;
			if (((o[0] & o[1]) | (o[5] & o[8]) | (o[4] & o[6])) & ~x[2] & ~out[1] & ~out[0]) begin
				out[2] = 1;
			end 
			else begin
				out[2] = 0;
	    		if (((o[4] & o[5]) | (o[0] & o[6])) & ~x[3] & ~out[2] & ~out[1] & ~out[0]) begin
	    			out[3] = 1;
	    		end 
	    		else begin
	    			out[3] = 0;
		    		if (((o[3] & o[5]) | (o[1] & o[7]) | (o[0] & o[8]) | (o[2] & o[6])) & ~x[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
		    			out[4] = 1;
		    		end 
		    		else begin
		    			out[4] = 0;
			    		if (((o[3] & o[4]) | (o[2] & o[8])) & ~x[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
			    			out[5] = 1;
			    		end 
			    		else begin
			    			out[5] = 0;
				    		if (((o[7] & o[8]) | (o[0] & o[3]) | (o[2] & o[4])) & ~x[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
				    			out[6] = 1;
				    		end 
				    		else begin
				    			out[6] = 0;
					    		if (((o[6] & o[8]) | (o[1] & o[4])) & ~x[7] & ~out[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
					    			out[7] = 1;
					    		end 
					    		else begin
					    			out[7] = 0;
						    		if (((o[6] & o[7]) | (o[2] & o[5]) | (o[0] & o[4])) & ~x[8] & ~out[7] & ~out[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
						    			out[8] = 1;
						    		end 
						    		else begin
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

endmodule