module selectO (
	input logic [8:0] o,
	input logic [8:0] in1,
	input logic [8:0] in2,
	input logic [8:0] in3,
	output logic [8:0] out
);

logic [8:0] c1, c2, c3;
assign c1 = in1 | o;
assign c2 = in2 | o;
assign c3 = in3 | o;

assign out = (in1!=9'b000_000_000) ? c1 : (in2!=9'b000_000_000) ? c2 : c3;

endmodule