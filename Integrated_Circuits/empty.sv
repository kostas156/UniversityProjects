module empty (
	input logic [8:0] o,
	input logic [8:0] x,
	output logic [8:0] out
);



always_comb begin
	out = 9'b000_000_000;
	if (~o[0] & ~x[0]) begin
		out[0] = 1;
	end 
	else begin
		out[0] = 0;
		if (~o[1] & ~x[1] & ~out[0]) begin
			out[1] = 1;
		end 
		else begin
			out[1] = 0;
			if (~o[2] & ~x[2] & ~out[1] & ~out[0]) begin
				out[2] = 1;
			end 
			else begin
				out[2] = 0;
				if (~o[3] & ~x[3] & ~out[2] & ~out[1] & ~out[0]) begin
					out[3] = 1;
				end 
				else begin
					out[3] = 0;
					if (~o[4] & ~x[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
						out[4] = 1;
					end 
					else begin
						out[4] = 0;
						if (~o[5] & ~x[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
							out[5] = 1;
						end 
						else begin
							out[5] = 0;
							if (~o[6] & ~x[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
								out[6] = 1;
							end 
							else begin
								out[6] = 0;
								if (~o[7] & ~x[7] & ~out[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
									out[7] = 1;
								end 
								else begin
									out[7] = 0;
									if (~o[8] & ~x[8] & ~out[7] & ~out[6] & ~out[5] & ~out[4] & ~out[3] & ~out[2] & ~out[1] & ~out[0]) begin
										out[8] = 1;
									end 
									else
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


endmodule