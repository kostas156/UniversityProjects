function fitness = fit_co(population, sizes_list, values_list, solSize, maxSize)
    if nargin<5
        [sizes_list, values_list, solSize, maxSize, ~] = imp_vals();
    end
    
    fitness = nan(size(population, 1), 1);

    sizeP = size(population);
    
    for i=1:sizeP(1)
        tot_val = 0;
        tot_weight = 0;
        
        
        for j=1:solSize
            tot_val = tot_val + values_list(j)*population(i,j);
            tot_weight = tot_weight + sizes_list(j)*population(i,j);
        end

        if tot_weight>maxSize
            tot_val = 0;
        end
        
        fitness(i) = tot_val;
    end

end
