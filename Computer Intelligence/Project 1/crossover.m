function [child1, child2] = crossover(parent1, parent2, soLen)
    if nargin<3
        [~, ~, soLen, ~, ~] = imp_vals();
    end
    parent1_Ones = find(parent1==1);
    parent2_Ones = find(parent2==1);
       
    if length(parent1_Ones)>1 && length(parent2_Ones)>1
        a = randi([1, min(length(parent1_Ones), length(parent2_Ones))]);
        
        child1 = zeros(1, soLen);
        child2 = zeros(1, soLen);
        
        child1(parent2_Ones(1:a)) = 1;
        child2(parent1_Ones(1:a)) = 1;
        
        child1(parent1_Ones(a+1:end)) = 1;
        child2(parent2_Ones(a+1:end)) = 1;
        
    else
        child1 = parent1;
        child2 = parent2;        
    end
end
