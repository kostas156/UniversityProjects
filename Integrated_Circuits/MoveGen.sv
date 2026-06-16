module MoveGen(
    input logic[8:0] x,
    input logic[8:0] o,
    output logic[8:0] newO
);

logic [8:0] newO1;
logic [8:0] newO2;
logic [8:0] newO3;


logic [8:0] x1, o1;
assign x1 = x;
assign o1 = o;


blockO block(.x(x1), .o(o1), .out(newO2));
winnerO winner(.x(x1), .o(o1), .out(newO1));
empty empty1(.x(x1), .o(o1), .out(newO3));

logic [8:0] test1, test2, test3;
assign test1 = newO1;
assign test2 = newO2;
assign test3 = newO3;

selectO select(.o(o), .in1(test1), .in2(test2), .in3(test3), .out(newO));


endmodule