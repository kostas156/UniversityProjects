function a = gen_init_population(count, solSize, maxItems)
    if nargin<3
        [~, ~, solSize, ~, maxItems] = imp_vals();
    end
    
    
    
    population = nan(count, solSize);
    
    sizeP = size(population);
    for i=1:count
        bits = zeros(1,solSize);
        numOnes = randi([1,maxItems]);
        p = int32(randperm(solSize, numOnes));
        for j=1:length(p)
            bits(p(j)) = 1;
        end
        
        population(i, 1:sizeP(2)) = bits;        
    end
    
    a = population;
end