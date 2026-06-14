function mutated_child = mutation(child)
    mutated_child = child;
    for i=1:length(child)
        %randomNum = rand();
        if rand()<(0.02/length(child))
            if mutated_child(i)==1
                mutated_child(i)=0;
            else
                b = find(mutated_child==1);
                if length(b)==3
                    indexb = randi([1 length(b)]);
                    oneToZero = b(indexb);
                    mutated_child(i)=1;
                    mutated_child(oneToZero) = 0;
                else
                    mutated_child(i)=1;
                    %disp(mutated_child)
                end
            end
        end
    end
end
    