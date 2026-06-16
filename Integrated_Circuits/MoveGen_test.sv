module MoveGen_test;

logic[8:0] x,o,newO;

MoveGen dut(.x(x), .o(o), .newO(newO));

//MoveGen_K dut(.x(x), .o(o), .newO(newO));

initial begin
    $monitor($time,"x = %b ,o= %b ,newO = %b\n",x,o,newO);
    $dumpfile("dump.vcd");
    $dumpvars(1);
    o = 9'b000_000_000;
    x = 9'b000_010_000;
    #20ns;
    o = 9'b000_010_001;
    x = 9'b000_101_010;
    #20ns;
    o = 9'b010_000_000;
    x = 9'b000_010_001;
    #20ns;
    o = 9'b100_000_000;
    x = 9'b000_010_001;
    #20ns;
    o = 9'b010_000_100;
    x = 9'b100_010_010;
    #20ns;
    o = 9'b100_000_100;
    x = 9'b001_010_001;
    #20ns;

    $finish;
end
endmodule